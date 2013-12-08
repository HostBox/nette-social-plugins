<?php

namespace HostBox\Components\Twitter\SocialPlugins;

/**
 * Class HashtagButton
 * @package HostBox\Components\Twitter\SocialPlugins
 *
 * @tagClass twitter-mention-button
 * @href intent/tweet?screen_name=$recipient
 */
class MentionButton extends TwitterPlugin {

    /**
     * @var string
     * @ignore
     */
    public $recipient = 'hello';

    /** @var string */
    public $related;

    /** @var string */
    public $text;

    /** @var string */
    public $size = self::SIZE_MEDIUM;

    /** @var boolean */
    public $dnt;

}