<?php

namespace HostBox\Components\Pinterest\SocialPlugins;

/**
 * Class BlockWidget
 * @package HostBox\Components\Pinterest\SocialPlugins
 */
abstract class BlockWidget extends PinterestPlugin {

    const
        IMAGE_WIDTH_SQUARE = 80,
        IMAGE_WIDTH_SIDEBAR = 60,
        IMAGE_WIDTH_HEADER = 115;

    const
        BOARD_HEIGHT_SQUARE = 320,
        BOARD_HEIGHT_SIDEBAR = 800,
        BOARD_HEIGHT_HEADER = 120;

    const
        BOARD_WIDTH_SQUARE = 400,
        BOARD_WIDTH_SIDEBAR = 150,
        BOARD_WIDTH_HEADER = 900;

    /**
     * @var string
     * @ignore
     */
    public $userName;

    /**
     * @name scaleWidth
     */
    public $imageWidth = self::IMAGE_WIDTH_SQUARE;

    /**
     * @name scaleHeight
     */
    public $boardHeight = self::BOARD_HEIGHT_SQUARE;

    /**
     * @name boardWidth
     */
    public $boardWidth = self::BOARD_WIDTH_SQUARE;

}
