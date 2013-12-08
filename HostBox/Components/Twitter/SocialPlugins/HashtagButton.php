<?php

namespace HostBox\Components\Twitter\SocialPlugins;

/**
 * Class HashtagButton
 * @package HostBox\Components\Twitter\SocialPlugins
 *
 * @tagClass twitter-hashtag-button
 * @href intent/tweet?button_hashtag=$hashtags
 */
class HashtagButton extends TwitterPlugin {

    /**
     * @var string
     * @ignore
     */
    public $hashtags;

    /** @var string */
    public $text;

    /** @var string */
    public $related;

    /** @var string */
    public $url;

    /** @var string */
    public $size = self::SIZE_MEDIUM;

    /** @var boolean */
    public $dnt;

}