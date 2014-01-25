<?php

namespace HostBox\Components\Google\SocialPlugins;


class Badge extends GooglePlugin {

    /** @var string */
    public $href;

    /** @var string */
    public $layout = self::LAYOUT_PORTRAIT;

    /** @var string */
    public $theme = self::THEME_LIGHT;

    /**
     * @var boolean
     * @name showcoverphoto
     */
    public $showCoverPhoto = TRUE;

    /**
     * @var boolean
     * @name showtagline
     */
    public $showTagLine = TRUE;

    /** @var int */
    public $width;

}
