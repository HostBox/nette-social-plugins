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

    protected function putDistinctionIntoTemplate() {
        parent::putDistinctionIntoTemplate();
        $reflection = $this->getReflection();
        $href = $reflection->getAnnotation('href');
        if ($href === NULL) {
            throw new Exception(sprintf('Class %s has not "href" annotation', $reflection->getShortName()));
        }
        $this->template->href = $this->fillVariablesInAnnotation('href');
        $this->template->config = $this->config;
        $text = $this->fillVariablesInAnnotation('text');
        if ($text !== NULL) {
            $this->template->text = $text;
        }
    }

}
