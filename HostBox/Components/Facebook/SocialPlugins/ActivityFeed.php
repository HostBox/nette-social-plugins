<?php

namespace HostBox\Components\Facebook\SocialPlugins;

/**
 * Class ActivityFeed
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @tagClass fb-activity
 */
class ActivityFeed extends FacebookPlugin {

    const
        LINK_TARGET_BLANK = '_blank',
        LINK_TARGET_SELF = '_self',
        LINK_TARGET_PARENT = '_parent',
        LINK_TARGET_TOP = '_top';

    /** @var string */
    public $action;

    /** @var mixed */
    public $appId;

    /**
     * @var string
     * @name colorscheme
     */
    public $colorScheme = self::COLOR_SCHEME_LIGHT;

    /** @var string */
    public $filter;

    /** @var boolean */
    public $header;

    /** @var mixed */
    public $height;

    /**
     * @var mixed
     * @name linktarget
     */
    public $linkTarget = self::LINK_TARGET_BLANK;

    /** @var int */
    public $maxAge = 0;

    /** @var boolean */
    public $recommendations = FALSE;

    /** @var string */
    public $ref;

    /** @var string */
    public $site;

    /** @var int */
    public $width = 300;
}