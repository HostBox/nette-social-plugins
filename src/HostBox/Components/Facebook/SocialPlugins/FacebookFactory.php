<?php

namespace HostBox\Components\Facebook\SocialPlugins;

use HostBox\Components\ComponentFactory;

/**
 * Class FacebookFactory
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @method ActivityFeed createActivityFeed(array $settings = array())
 * @method Comments createComments(array $settings = array())
 * @method EmbeddedPost createEmbeddedPost(array $settings = array())
 * @method Facepile createFacepile(array $settings = array())
 * @method FollowButton createFollowButton(array $settings = array())
 * @method LikeBox createLikeBox(array $settings = array())
 * @method LikeButton createLikeButton(array $settings = array())
 * @method SendButton createSendButton(array $settings = array())
 * @method ShareButton createShareButton(array $settings = array())
 */
class FacebookFactory extends ComponentFactory {

    /**
     * @param Config $config
     */
    function __construct(Config $config) {
        $this->config = $config;
    }

}
