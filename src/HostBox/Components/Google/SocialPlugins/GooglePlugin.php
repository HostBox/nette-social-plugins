<?php

namespace HostBox\Components\Google\SocialPlugins;

use HostBox\Components\SocialPluginComponent;


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

    const
        LAYOUT_LANDSCAPE = 'landscape',
        LAYOUT_PORTRAIT = 'portrait';

    const
        THEME_LIGHT = 'light',
        THEME_DARK = 'dark';


    /**
     * @param Config $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
    }

}
