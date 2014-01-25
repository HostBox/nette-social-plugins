<?php

namespace HostBox\Components\Twitter\SocialPlugins;


/**
 * @identifier twitter-timeline
 * @href search?q=%23$query
 * @text Tweets about "#$query"
 */
class EmbeddedSearch extends Embedded {

    /**
     * @var string
     * @ignore
     */
    public $query;

}
