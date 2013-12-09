<?php

namespace HostBox\Components\Facebook\SocialPlugins;

/**
 * Class LikeBox
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @tagClass fb-like-box
 */
class LikeBox extends FacebookPlugin {

    /**
     * @var string
     * @name colorscheme
     */
    public $colorScheme = self::COLOR_SCHEME_LIGHT;

    /** @var boolean */
    public $forceWall = FALSE;

    /** @var mixed */
    public $header;

    /** @var mixed */
    public $height;

    /** @var string */
    public $href;

    /** @var boolean */
    public $showBorder = TRUE;

    /** @var boolean */
    public $stream = TRUE;

    /** @var boolean */
    public $showFaces;

    /** @var string */
    public $width;

}
