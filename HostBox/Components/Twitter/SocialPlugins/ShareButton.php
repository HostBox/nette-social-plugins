<?php

namespace HostBox\Components\Twitter\SocialPlugins;

/**
 * Class ShareButton
 * @package HostBox\Components\Twitter\SocialPlugins
 *
 * @tagClass twitter-share-button
 * @href share
 * @text Tweet
 */
class ShareButton extends TwitterPlugin {

    /** @var string */
    public $size = self::SIZE_MEDIUM;

    /** @var string */
    public $count = self::COUNT_HORIZONTAL;

    /** @var string */
    public $url;

    /** @var string */
    public $text;

    /** @var string */
    public $via;

    /** @var string */
    public $related;

    /** @var string */
    public $hashtags;

    /** @var boolean */
    public $dnt;

}
