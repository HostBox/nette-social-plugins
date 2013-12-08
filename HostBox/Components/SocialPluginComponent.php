<?php

namespace HostBox\Components;

use Nette\Application as Nette;
use Nette\Reflection\ClassType;

/**
 * Class SocialPluginComponent
 * @package HostBox\Components
 */
class SocialPluginComponent extends Nette\UI\Control {

    /** @var mixed */
    protected $config;

    /**
     * @param array|null $settings
     */
    public function render($settings = array()) {
        $this->updateSettings($settings);
        $this->putSettingsIntoTemplate();
        $this->renderComponent();
    }

    public function renderJsScript() {
        $this->template->config = $this->config;
        $this->template->registerHelper('booleanToInt', function ($value) {
            return $value ? '1' : '0';
        });
        $this->renderComponent();
    }

    /**
     * @param array $settings
     */
    public function assign(array $settings) {
        $this->updateSettings($settings);
    }


    protected function renderComponent() {
        list(, $caller) = debug_backtrace(2);
        $functionName = $caller['function'];
        if (substr($functionName, 0, 6) != "render") {
            if (trim($functionName) == '') {
                throw new \Exception("Unknown render function");
            }
        }

        if ($caller['function'] !== "render") {
            $functionName = lcfirst(substr($functionName, 6, strlen($functionName)));
        } else {
            $functionName = 'default';
        }


        /** @var ClassType $calledClass */
        $calledClass = get_called_class();
        $reflection = $calledClass::getReflection();
        $fileName = $reflection->getFileName();
        $componentFolder = substr($fileName, 0, strrpos($fileName, $reflection->getShortName()) - 1) . '/templates';

        $this->template->setFile(sprintf('%s/%s.latte', $componentFolder, $functionName));
        $this->template->render();
    }

    /**
     * @param array $settings
     */
    private function updateSettings(array $settings) {
        if (!is_array($settings) || empty($settings))
            return;

        $properties = $this->getReflection()->getProperties();
        if (count($properties) > 0) {
            foreach ($properties as $property) {
                dump($property->name);
                if ($property->isPublic()) {
                    $propertyName = $property->name;
                    if (array_key_exists($propertyName, $settings)) {
                        $this->$propertyName = $settings[$property->name];
                    }
                }
            }
        }
    }


    protected function putSettingsIntoTemplate() {
        $reflection = $this->getReflection();
        $properties = $reflection->getProperties();
        if (count($properties) > 0) {
            $result = array();
            foreach ($properties as $property) {
                if ($property->isPublic()) {
                    $propertyName = $property->name;
                    if (($value = $this->$propertyName) !== NULL && $property->getAnnotation('ignore') !== NULL) {
                        if (($name = $property->getAnnotation('name')) === NULL) {
                            $name = preg_replace('#(.)(?=[A-Z])#', '$1-', $property->name);
                            $name = strtolower($name);
                            $name = rawurlencode($name);
                        }

                        if (is_bool($value) === TRUE) {
                            $value = ($value ? 'true' : 'false');
                        }
                        $result[] = 'data-' . $name . '="' . $value . '"';
                    }
                }
            }
            $this->template->pluginSettings = implode(' ', $result);
        }
        $this->putDistinctionIntoTemplate();
    }

    protected function putDistinctionIntoTemplate() {
        $tagClass = $this->getReflection()->getAnnotation('tagClass');
        if ($tagClass === NULL) {
            throw new \Exception();
        }
        $this->template->tagClass = $tagClass;
    }

} 