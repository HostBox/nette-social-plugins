<?php

namespace HostBox\Components\LinkedIn\SocialPlugins;

use HostBox\Components\SocialPluginComponent;

/**
 * Class Button
 * @package HostBox\Components\LinkedIn\SocialPlugins
 */
abstract class Button extends SocialPluginComponent {

    const
        COUNTER_NONE = 'none',
        COUNTER_RIGHT = 'right',
        COUNTER_TOP = 'top';

    /** @var string */
    public $counter = self::COUNTER_RIGHT;

    /**
     * @var boolean
     * @name showzero
     */
    public $showZero = TRUE;

}
