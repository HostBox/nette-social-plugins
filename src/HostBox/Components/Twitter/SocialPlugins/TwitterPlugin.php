<?php

namespace HostBox\Components\Twitter\SocialPlugins;

use Exception;
use HostBox\Components\SocialPluginComponent;


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
    protected function putDistinctionIntoTemplate() {
        parent::putDistinctionIntoTemplate();
        $reflection = $this->getReflection();
        if (!$reflection->hasAnnotation('href')) {
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
