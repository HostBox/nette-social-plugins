<?php

namespace HostBox\Components\LinkedIn\SocialPlugins;

/**
 * Class RecommendButton
 * @package HostBox\Components\LinkedIn\SocialPlugins
 *
 * @tagClass IN/RecommendProduct
 */
class RecommendButton extends Button {

    /**
     * Company name or ID
     * @var string
     * @name company
     */
    public $companyId;

    /**
     * @var integer
     * @name product
     */
    public $productId;
}
