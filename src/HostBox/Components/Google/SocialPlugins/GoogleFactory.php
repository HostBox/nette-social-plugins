<?php

namespace HostBox\Components\Google\SocialPlugins;

use HostBox\Components\ComponentFactory;

/**
 * Class GoogleFactory
 * @package HostBox\Components\Google\SocialPlugins
 *
 * @method CommunityBadge createCommunityBadge(array $settings = array())
 * @method PageBadge createPageBadge(array $settings = array())
 * @method PlusOneButton createPlusOneButton(array $settings = array())
 * @method ProfileBadge createProfileBadge(array $settings = array())
 * @method ShareButton createShareButton(array $settings = array())
 */
class GoogleFactory extends ComponentFactory {

    /**
     * @param Config $config
     */
    function __construct(Config $config) {
        $this->config = $config;
    }

}
