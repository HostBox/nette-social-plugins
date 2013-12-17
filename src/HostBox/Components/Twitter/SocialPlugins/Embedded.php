<?php

namespace HostBox\Components\Twitter\SocialPlugins;

/**
 * Class Embedded
 * @package HostBox\Components\Twitter\SocialPlugins
 */
abstract class Embedded extends TwitterPlugin {

    const
        THEME_LIGHT = 'light',
        THEME_DARK = 'dark';


    /** @var string */
    public $widgetId;

    /** @var string */
    public $theme;

    /** @var string */
    public $linkColor;

    /**
     * @var int
     * @noPrefix
     */
    public $width;

    /**
     * @var int
     * @noPrefix
     */
    public $height;

    /** @var string */
    public $chrome;

    /** @var string */
    public $borderColor;

    /**
     * Range <1,20>
     * @var int
     */
    public $tweetLimit;

    /** @var string */
    public $related;

    /** @var string */
    public $ariaPolite;

    /** @var boolean */
    public $dnt = TRUE;

}
