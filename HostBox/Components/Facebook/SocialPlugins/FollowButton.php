<?php

namespace HostBox\Components\Facebook\SocialPlugins;

/**
 * Class FollowButton
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @tagClass fb-follow
 */
class FollowButton extends FacebookPlugin {

    /**
     * @var string
     * @name colorscheme
     */
    public $colorScheme = self::COLOR_SCHEME_LIGHT;

    /** @var string */
    public $href;

    /** @var boolean */
    public $kidDirectedSite = FALSE;

    /** @var string */
    public $layout = self::LAYOUT_STANDART;

    /** @var boolean */
    public $showFaces = FALSE;

    /** @var string */
    public $width;

}
