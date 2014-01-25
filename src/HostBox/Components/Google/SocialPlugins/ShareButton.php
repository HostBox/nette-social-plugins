<?php

namespace HostBox\Components\Google\SocialPlugins;


/**
 * @identifier g-plus
 */
class ShareButton extends GooglePlugin {

    const ANNOTATION_VERTICAL_BUBBLE = 'vertical-bubble';

    const
        EXPAND_TO_TOP = 'top',
        EXPAND_TO_RIGHT = 'right',
        EXPAND_TO_BOTTOM = 'bottom',
        EXPAND_TO_LEFT = 'left';


    /** @var string */
    public $action = 'share';

    /** @var string */
    public $href;

    /** @var string */
    public $annotation = self::ANNOTATION_BUBBLE;

    /** @var int */
    public $width;

    /** @var int */
    public $height = 20;

    /** @var string */
    public $align = self::ALIGN_LEFT;

    /**
     * @var string
     * @name expandTo
     */
    public $expandTo;

}
