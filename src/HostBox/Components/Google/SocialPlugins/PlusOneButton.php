<?php

namespace HostBox\Components\Google\SocialPlugins;


/**
 * @identifier g-plusone
 */
class PlusOneButton extends GooglePlugin {

    /** @var string */
    public $href;

    /** @var string */
    public $size = self::SIZE_STANDART;

    /** @var string */
    public $annotation = self::ANNOTATION_INLINE;

    /** @var string */
    public $width;

    /** @var string */
    public $align = self::ALIGN_LEFT;

    /** @var boolean */
    public $recommendations = TRUE;

    /** @var boolean */
    public $count = TRUE;

}
