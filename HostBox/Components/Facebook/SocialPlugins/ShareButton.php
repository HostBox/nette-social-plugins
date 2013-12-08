<?php

namespace HostBox\Components\Facebook\SocialPlugins;

/**
 * Class ShareButton
 * @package HostBox\Components\Facebook\SocialPlugins
 *
 * @tagClass fb-share-button
 */
class ShareButton extends FacebookPlugin {

    const
        LAYOUT_ICON_LINK = 'icon_link',
        LAYOUT_ICON = 'icon',
        LAYOUT_LINK = 'link';


    /** @var string */
    public $href;

    /** @var string */
    public $layout = self::LAYOUT_BUTTON_COUNT;

    /** @var string */
    public $width;
}