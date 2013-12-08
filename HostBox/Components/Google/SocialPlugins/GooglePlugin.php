<?php

namespace HostBox\Components\Google\SocialPlugins;

use HostBox\Components\SocialPluginComponent;
use Nette\Application as Nette;

/**
 * Class BasePlugin
 * @package HostBox\Components\Google\SocialPlugins
 */
abstract class GooglePlugin extends SocialPluginComponent {

    const
        SIZE_SMALL = 'small',
        SIZE_MEDIUM = 'medium',
        SIZE_STANDART = 'standart',
        SIZE_TALL = 'tall';

    const
        ANNOTATION_NONE = 'none',
        ANNOTATION_BUBBLE = 'bubble',
        ANNOTATION_INLINE = 'inline';

    const
        ALIGN_RIGHT = 'right',
        ALIGN_LEFT = 'left';


    /**
     * @param Config $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
    }

} 