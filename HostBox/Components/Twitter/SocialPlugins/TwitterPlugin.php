<?php

namespace HostBox\Components\Twitter\SocialPlugins;

use Exception;
use HostBox\Components\SocialPluginComponent;

/**
 * Class TwitterPlugin
 * @package HostBox\Components\Twitter\SocialPlugins
 */
abstract class TwitterPlugin extends SocialPluginComponent {

    const
        SIZE_MEDIUM = 'medium',
        SIZE_LARGE = 'large';

    const
        COUNT_NONE = 'none',
        COUNT_HORIZONTAL = 'horizontal',
        COUNT_VERTICAL = 'vertical';

    /**
     * @param Config $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
    }

    /**
     * @inheritdoc
     */
    public function render($settings = array()) {
        $this->template->config = $this->config;
        $text = $this->fillVariablesInAnnotation('text');
        if ($text !== NULL) {
            $this->template->text = $text;
        }
        parent::render($settings);
    }

    protected function putDistinctionIntoTemplate() {
        parent::putDistinctionIntoTemplate();
        $reflection = $this->getReflection();
        $href = $reflection->getAnnotation('href');
        if ($href === NULL) {
            throw new Exception(sprintf('Class %s has not "href" annotation', $reflection->getShortName()));
        }
        $this->template->href = $this->fillVariablesInAnnotation('href');
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

}
