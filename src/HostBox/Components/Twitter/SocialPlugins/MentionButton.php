<?php

namespace HostBox\Components\Twitter\SocialPlugins;


/**
 * @identifier twitter-mention-button
 * @href intent/tweet?screen_name=$recipient
 * @text Tweet to &#64;$recipient
 */
class MentionButton extends TwitterPlugin {

    /**
     * @var string
     * @ignore
     */
    public $recipient;

    /** @var string */
    public $related;

    /** @var string */
    public $text;

    /** @var string */
    public $size = self::SIZE_MEDIUM;

    /** @var boolean */
    public $dnt;

}
