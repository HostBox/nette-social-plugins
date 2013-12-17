<?php

namespace HostBox\Components\Twitter\SocialPlugins;

use HostBox\Components\ComponentFactory;

/**
 * Class TwitterFactory
 * @package HostBox\Components\Twitter\SocialPlugins
 *
 * @method EmbeddedFavorites createEmbeddedFavorites(array $settings = array())
 * @method EmbeddedSearch createEmbeddedSearch(array $settings = array())
 * @method EmbeddedTimeline createEmbeddedTimeline(array $settings = array())
 * @method FollowButton createFollowButton(array $settings = array())
 * @method HashtagButton createHashtagButton(array $settings = array())
 * @method MentionButton createMentionButton(array $settings = array())
 * @method ShareButton createShareButton(array $settings = array())
 */
class TwitterFactory extends ComponentFactory {

    /**
     * @param Config $config
     */
    function __construct(Config $config) {
        $this->config = $config;
    }

}
