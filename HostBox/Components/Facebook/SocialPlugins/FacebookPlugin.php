<?php

namespace HostBox\Components\Facebook\SocialPlugins;

use HostBox\Components\SocialPluginComponent;
use Nette\Application as Nette;

/**
 * Class BasePlugin
 * @package HostBox\Components\Facebook\SocialPlugins
 */
abstract class FacebookPlugin extends SocialPluginComponent {

    const
        ACTION_LIKE = 'like',
        ACTION_RECOMMEND = 'recommend';

    const
        COLOR_SCHEME_LIGHT = 'light',
        COLOR_SCHEME_DARK = 'dark';

    const
        LAYOUT_STANDART = 'standart',
        LAYOUT_BOX_COUNT = 'box_count',
        LAYOUT_BUTTON_COUNT = 'button_count',
        LAYOUT_BUTTON = 'button';

    const
        ORDER_BY_SOCIAL = 'social',
        ORDER_BY_REVERSE_TIME = 'reverse_time',
        ORDER_BY_TIME = 'time';


    /**
     * @param Config $config
     */
    public function __construct(Config $config) {
        $this->config = $config;
    }


    public function renderJsScript() {
        $this->template->config = $this->config;
        $this->template->registerHelper('booleanToInt', function ($value) {
            return $value ? '1' : '0';
        });
        parent::renderJsScript();
    }


    /**
     * @return Config
     */
    public function getConfig() {
        return $this->config;
    }

} 