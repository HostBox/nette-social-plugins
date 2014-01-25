<?php

namespace HostBox\Components\Twitter\SocialPlugins;


/**
 * @identifier twitter-follow-button
 * @href $via
 * @text Follow @$via
 */
class FollowButton extends TwitterPlugin {

    /** @var string */
    public $size = self::SIZE_MEDIUM;

    /** @var boolean */
    public $showCount = FALSE;

    /** @var boolean */
    public $showScreenName = FALSE;

    /**
     * @var string
     * @ignore
     */
    public $via;

}
