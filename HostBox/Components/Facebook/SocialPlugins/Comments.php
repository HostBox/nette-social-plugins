<?php

namespace HostBox\Components\Facebook\SocialPlugins;

/**
 * Class Comments
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @identifier fb-comments
 */
class Comments extends FacebookPlugin {

    /**
     * @var string
     * @name colorscheme
     */
    public $colorScheme = self::COLOR_SCHEME_LIGHT;

    /** @var string */
    public $href;

    /** @var string */
    public $mobile;

    /** @var int */
    public $numPosts = 10;

    /** @var string */
    public $orderBy = self::ORDER_BY_SOCIAL;

    /** @var string */
    public $width = 550;

}
