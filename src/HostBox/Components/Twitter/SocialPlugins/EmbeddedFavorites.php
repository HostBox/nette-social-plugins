<?php

namespace HostBox\Components\Twitter\SocialPlugins;


/**
 * @identifier twitter-timeline
 * @href $via/favorites
 * @text Favorite Tweets by @$via
 */
class EmbeddedFavorites extends Embedded {

    /**
     * @var string
     * @ignore
     */
    public $via;

}
