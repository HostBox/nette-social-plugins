<?php

namespace HostBox\Components\Twitter\SocialPlugins;


/**
 * @identifier twitter-timeline
 * @href $via
 * @text Tweets by &#064;$via
 * @widget-id $widgetId
 */
class EmbeddedTimeline extends Embedded {

    /**
     * @var string
     */
    public $via;
	
    /**
     * @var string
     */
    public $widgetId;

}
