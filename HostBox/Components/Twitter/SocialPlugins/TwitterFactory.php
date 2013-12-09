<?php

namespace HostBox\Components\Twitter\SocialPlugins;

use HostBox\Components\ComponentFactory;

/**
 * Class TwitterFactory
 * @package HostBox\Components\Twitter\SocialPlugins
 *
 * @method createEmbeddedFavorites(array $settings = array())
 * @method createEmbeddedSearch(array $settings = array())
 * @method createEmbeddedTimeline(array $settings = array())
 * @method createFollowButton(array $settings = array())
 * @method createHashtagButton(array $settings = array())
 * @method createMentionButton(array $settings = array())
 * @method createShareButton(array $settings = array())
 */
class TwitterFactory extends ComponentFactory {

    /**
     * @param Config $config
     */
    function __construct(Config $config) {
        $this->config = $config;
    }

}
