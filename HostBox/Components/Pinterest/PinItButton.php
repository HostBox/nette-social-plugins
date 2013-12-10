<?php

namespace HostBox\Components\Pinterest\SocialPlugins;

/**
 * Class PinItButton
 * @package HostBox\Components\Pinterest\SocialPlugins
 *
 * @tagClass buttonPin
 * @href pin/create/button/?url=$websiteUrl&media=$imageUrl&description=$description
 */
class PinItButton extends PinterestPlugin {

    const
        SIZE_SMALL = '20',
        SIZE_LARGE = '28';

    const
        THEME_GRAY = 'gray',
        THEME_RED = 'red',
        THEME_WHITE = 'white';

    const
        // Not show
        LAYOUT_COUNT_NONE = 'none',
        // Above the Button
        LAYOUT_COUNT_ABOVE = 'above',
        // Beside the Button
        LAYOUT_COUNT_BESIDE = 'beside';

    /**
     * @var int
     * @name height
     */
    public $size = self::SIZE_SMALL;

    /**
     * @var string
     * @name color
     */
    public $theme = self::THEME_GRAY;

    /**
     * @var string
     * @name config
     */
    public $layout = self::LAYOUT_COUNT_ABOVE;

    /**
     * @var string
     * @ignore
     */
    public $websiteUrl;

    /**
     * @var string
     * @ignore
     */
    public $imageUrl;

    /**
     * @var string
     * @ignore
     */
    public $description;

    /**
     * @inheritdoc
     */
    public function render($settings = array()) {
        $this->template->theme = $this->theme;
        $this->template->size = $this->size;
        parent::render($settings);
    }


}
