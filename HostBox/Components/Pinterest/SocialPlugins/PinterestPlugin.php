<?php

namespace HostBox\Components\Pinterest\SocialPlugins;

use HostBox\Components\SocialPluginComponent;

/**
 * Class PinterestPlugin
 * @package HostBox\Components\Pinterest\SocialPlugins
 *
 * @prefix data-pin-
 */
abstract class PinterestPlugin extends SocialPluginComponent {

    protected function putDistinctionIntoTemplate() {
        parent::putDistinctionIntoTemplate();
        $reflection = $this->getReflection();
        $href = $reflection->getAnnotation('href');
        if ($href === NULL) {
            throw new \Exception(sprintf('Class %s has not "href" annotation', $reflection->getShortName()));
        }
        $this->template->href = $this->fillVariablesInAnnotation('href');

        $text = $this->fillVariablesInAnnotation('text');
        if ($text !== NULL) {
            $this->template->text = $text;
        }
    }

}
