<?php

namespace HostBox\Components\Facebook\SocialPlugins;

/**
 * Class SendButton
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @tagClass fb-send
 */
class SendButton extends FacebookPlugin {

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
    public $ref;
}