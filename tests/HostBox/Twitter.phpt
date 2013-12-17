<?php

use HostBox\Components\Twitter\SocialPlugins;

require_once __DIR__ . '\bootstrap.php';


$factory = new SocialPlugins\TwitterFactory(
    $config = new SocialPlugins\Config()
);

$cases = array(
    array('HostBox\Components\Twitter\SocialPlugins\EmbeddedFavorites', $factory->createEmbeddedFavorites()),
    array('HostBox\Components\Twitter\SocialPlugins\EmbeddedSearch', $factory->createEmbeddedSearch()),
    array('HostBox\Components\Twitter\SocialPlugins\EmbeddedTimeline', $factory->createEmbeddedTimeline()),
    array('HostBox\Components\Twitter\SocialPlugins\FollowButton', $factory->createFollowButton()),
    array('HostBox\Components\Twitter\SocialPlugins\HashtagButton', $factory->createHashtagButton()),
    array('HostBox\Components\Twitter\SocialPlugins\MentionButton', $factory->createMentionButton()),
    array('HostBox\Components\Twitter\SocialPlugins\ShareButton', $factory->createShareButton())
);

foreach ($cases as $case) {
    Tester\Assert::type($case[0], $case[1]);
}
