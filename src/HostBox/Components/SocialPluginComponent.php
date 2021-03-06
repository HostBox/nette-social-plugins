<?php

namespace HostBox\Components;

use Exception;
use Nette\Application as Nette;
use Nette\Reflection\ClassType;


abstract class SocialPluginComponent extends Nette\UI\Control implements ISocialPluginComponent {

    /** @var mixed */
    protected $config;


    /**
     * @inheritdoc
     */
    public function render($settings = array()) {
        $this->putSettingsIntoTemplate($settings);
        $this->renderComponent();
    }

    /**
     * @inheritdoc
     */
    public function renderJsScript() {
        $this->template->config = $this->config;
        $this->template->registerHelper('booleanToInt', function ($value) {
            return $value ? '1' : '0';
        });
        $this->renderComponent(__FUNCTION__);
    }

    /**
     * @inheritdoc
     */
    public function assign(array $settings) {
        if (!is_array($settings) || empty($settings))
            return;

        $properties = $this->getReflection()->getProperties(\ReflectionProperty::IS_PUBLIC);
        if (count($properties) > 0) {
            foreach ($properties as $property) {
                if ($property->getDeclaringClass() == 'Nette\Application\UI\Control') {
                    break;
                }

                $propertyName = $property->name;
                if (array_key_exists($propertyName, $settings)) {
                    $this->$propertyName = $settings[$property->name];
                }
            }
        }
    }

    /**
     * @param string $functionName
     * @return void
     * @throws \Exception
     */
    protected function renderComponent($functionName = 'render') {
        if (substr($functionName, 0, 6) != "render") {
            if (trim($functionName) == '') {
                throw new Exception("Unknown render function");
            }
        }

        $reflection = $this->getReflection();
        $fileName = $reflection->getFileName();
        $componentFolder = substr($fileName, 0, strrpos($fileName, $reflection->getShortName()) - 1) . '/templates';

        $functionName = $functionName != "render" ? lcfirst(substr($functionName, 6, strlen($functionName))) : 'default';

        $this->template->setFile(sprintf('%s/%s.latte', $componentFolder, $functionName));
        $this->template->render();
    }

    /**
     * @param array $tempSettings
     * @return void
     */
    protected function putSettingsIntoTemplate($tempSettings = array()) {
        $properties = $this->getReflection()->getProperties(\ReflectionProperty::IS_PUBLIC);

        if (count($properties) > 0) {
            $result = array();

            $prefix = 'data-';
            foreach ($this->getPluginFamilyLine() as $childReflection) {
                if ($childReflection->hasAnnotation('prefix')) {
                    $prefix = $childReflection->getAnnotation('prefix');
                }
            }

            foreach ($properties as $property) {
                if ($property->getDeclaringClass() == 'Nette\Application\UI\Control') {
                    break;
                }

                if (!$property->hasAnnotation('ignore')) {
                    if (($name = $property->getAnnotation('name')) === NULL) {
                        $name = preg_replace('#(.)(?=[A-Z])#', '$1-', $property->name);
                        $name = strtolower($name);
                        $name = rawurlencode($name);
                    }

                    $value = $this->{$property->name};
                    if (is_array($tempSettings) && !empty($tempSettings) && array_key_exists($property->name, $tempSettings)) {
                        $value = $tempSettings[$property->name];
                    }

                    if (is_bool($value) === TRUE) {
                        $value = ($value ? 'true' : 'false');
                    }

                    if ($value !== NULL) {
                        $prefix = (!$property->hasAnnotation('noPrefix') ? $prefix : '');
                        $result[] = sprintf('%s%s="%s"', $prefix, $name, $value);
                    }
                }
            }
            $this->template->pluginSettings = implode(' ', $result);
        }
        $this->putDistinctionIntoTemplate();
    }

    /**
     * @throws \Exception
     * @return void
     */
    protected function putDistinctionIntoTemplate() {
        $reflection = $this->getReflection();
        $identifier = $reflection->getAnnotation('identifier');
        if ($identifier === NULL) {
            throw new Exception(sprintf('Class %s has not "identifier" annotation', $reflection->getShortName()));
        }
        $this->template->identifier = $identifier;
    }

    /**
     * @param $name
     * @return string|null
     * @throws \Exception
     */
    protected function fillVariablesInAnnotation($name) {
        $reflection = $this->getReflection();
        $annotation = $reflection->getAnnotation($name);
        if ($annotation === NULL) {
            return NULL;
        }

        if ($mResult = preg_match_all('/\$[a-zA-Z]+/', $annotation, $matches) > 0) {
            foreach ($matches[0] as $match) {
                $rMatch = substr($match, 1, strlen($match) - 1);
                if ($reflection->hasProperty($rMatch) === TRUE && $reflection->getProperty($rMatch)->isPublic()) {
                    $annotation = str_replace($match, $this->$rMatch, $annotation);
                }
            }
        }

        if (preg_match_all('/\$[a-zA-Z]+/', $annotation, $matches) > 0)
            throw new Exception(sprintf('Annotation @%s contains unfilled variables', $name));

        return $annotation;
    }

    /**
     * @return ClassType[]
     */
    private function getPluginFamilyLine() {
        $members = array($member = new ClassType(get_called_class()));
        while ($member = $member->getParentClass()) {
            if ($member->name === 'HostBox\Components\SocialPluginComponent')
                break;

            $members[] = $member;
        }

        return array_reverse($members);
    }

}
