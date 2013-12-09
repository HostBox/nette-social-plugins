<?php

namespace HostBox\Components\Google\SocialPlugins;

use HostBox\Components\ComponentFactory;

/**
 * Class GoogleFactory
 * @package HostBox\Components\Google\SocialPlugins
 *
 * @method createCommunityBadge(array $settings = array())
 * @method createPageBadge(array $settings = array())
 * @method createPlusOneButton(array $settings = array())
 * @method createProfileBadge(array $settings = array())
 * @method createShareButton(array $settings = array())
 */
class GoogleFactory extends ComponentFactory {

    /**
     * @param Config $config
     */
    function __construct(Config $config) {
        $this->config = $config;
    }

}
