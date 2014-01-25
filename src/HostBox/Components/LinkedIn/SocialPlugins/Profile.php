<?php

namespace HostBox\Components\LinkedIn\SocialPlugins;

use HostBox\Components\SocialPluginComponent;


abstract class Profile extends SocialPluginComponent {

    const
        FORMAT_INLINE = 'inline',
        FORMAT_HOVER = 'hover',
        FORMAT_CLICK = 'click';


    /** @var string */
    public $format = self::FORMAT_INLINE;

    /** @var boolean */
    public $related = FALSE;

    /** @var string */
    public $text;

    /** @var integer */
    public $width;

}
