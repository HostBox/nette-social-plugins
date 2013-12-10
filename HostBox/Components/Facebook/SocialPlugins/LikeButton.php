<?php

namespace HostBox\Components\Facebook\SocialPlugins;

/**
 * Class LikeButton
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @tagClass fb-like
 */
class LikeButton extends FacebookPlugin {

    /** @var string */
    public $action = self::ACTION_LIKE;

    /**
     * @var string
     * @name colorscheme
     */
    public $colorScheme = self::COLOR_SCHEME_LIGHT;

    /** @var string */
    public $href;

    /** @var boolean */
    public $kidDirectedSite;

    /** @var string */
    public $layout = self::LAYOUT_STANDARD;

    /** @var string */
    public $ref;

    /** @var boolean */
    public $share;

    /** @var boolean */
    public $showFaces;

    /** @var string */
    public $width;

}
