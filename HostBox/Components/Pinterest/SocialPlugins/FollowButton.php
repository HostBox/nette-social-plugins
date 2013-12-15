<?php

namespace HostBox\Components\Pinterest\SocialPlugins;

/**
 * Class FollowButton
 * @package HostBox\Components\Pinterest\SocialPlugins
 *
 * @identifier buttonFollow
 * @href $userName/
 * @text $text
 */
class FollowButton extends PinterestPlugin {

    /**
     * @var string
     * @ignore
     */
    public $userName;

    /**
     * @var string
     * @ignore
     */
    public $text;

}
