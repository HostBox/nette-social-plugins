<?php

namespace HostBox\Components;

use Nette;

/**
 * Class ComponentFactory
 * @package HostBox\Components
 */
abstract class ComponentFactory extends Nette\Object {

    /** @var mixed */
    protected $config;

    /** @var array */
    protected $plugins;

    /**
     * @param string $name
     * @param array $args
     * @return ISocialPluginComponent|mixed
     * @throws \Nette\MemberAccessException
     */
    public function __call($name, $args) {
        if (substr($name, 0, 6) == 'create' && strlen($name) > 6) {
            $name = substr($name, -(strlen($name) - 6));

            /** @var Nette\Reflection\ClassType $calledClass */
            $calledClass = get_called_class();
            $reflection = $calledClass::getReflection();
            $namespace = $reflection->getNamespaceName();

            $componentName = $namespace . '\\' . $name;

            if ($reflection->getName() == 'HostBox\Components\Pinterest\SocialPlugins\PinterestFactory' ||
                $reflection->getName() == 'HostBox\Components\LinkedIn\SocialPlugins\LinkedInFactory') {
                $component = new $componentName;
            } else {
                if ($this->config === NULL) {
                    throw new Nette\MemberAccessException('Config is not set');
                }
                $component = new $componentName($this->config);
            }

            if (!empty($args) && is_array($settings = $args[0])) {
                /** @var ISocialPluginComponent $component */
                $component->assign($settings);
            }

            return $component;
        } else {
            throw new Nette\MemberAccessException(sprintf('%s is not create method', $name));
        }
    }

}
