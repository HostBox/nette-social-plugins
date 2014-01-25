<?php

namespace HostBox\Components\Facebook\SocialPlugins;


/**
 * @identifier fb-facepile
 */
class Facepile extends FacebookPlugin {

    const
        SIZE_SMALL = 'small',
        SIZE_MEDIUM = 'medium',
        SIZE_LARGE = 'large';

    /** @var string */
    public $action = self::ACTION_LIKE;

    /** @var mixed */
    public $appId;

    /**
     * @var string
     * @name colorscheme
     */
    public $colorScheme = self::COLOR_SCHEME_LIGHT;

    /** @var string */
    public $href;

    /** @var int */
    public $maxRows = 1;

    /** @var string */
    public $size = self::SIZE_MEDIUM;

    /** @var string */
    public $width;

}
