<?php

namespace HostBox\Components\Facebook\SocialPlugins;

use HostBox\Components\ComponentFactory;

/**
 * Class FacebookFactory
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @method createActivityFeed(array $settings = array())
 * @method createComments(array $settings = array())
 * @method createEmbeddedPost(array $settings = array())
 * @method createFacepile(array $settings = array())
 * @method createFollowButton(array $settings = array())
 * @method createLikeBox(array $settings = array())
 * @method createLikeButton(array $settings = array())
 * @method createSendButton(array $settings = array())
 * @method createShareButton(array $settings = array())
 */
class FacebookFactory extends ComponentFactory {

    /**
     * @param Config $config
     */
    function __construct(Config $config) {
        $this->config = $config;
    }

}
