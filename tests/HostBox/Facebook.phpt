<?php

use HostBox\Components\Facebook\SocialPlugins;

require_once __DIR__ . '\bootstrap.php';


$factory = new SocialPlugins\FacebookFactory(
    $config = new SocialPlugins\Config('unknown')
);

$cases = array(
    array('HostBox\Components\Facebook\SocialPlugins\ActivityFeed', $factory->createActivityFeed()),
    array('HostBox\Components\Facebook\SocialPlugins\Comments', $factory->createComments()),
    array('HostBox\Components\Facebook\SocialPlugins\EmbeddedPost', $factory->createEmbeddedPost()),
    array('HostBox\Components\Facebook\SocialPlugins\Facepile', $factory->createFacepile()),
    array('HostBox\Components\Facebook\SocialPlugins\FollowButton', $factory->createFollowButton()),
    array('HostBox\Components\Facebook\SocialPlugins\LikeBox', $factory->createLikeBox()),
    array('HostBox\Components\Facebook\SocialPlugins\LikeButton', $factory->createLikeButton()),
    array('HostBox\Components\Facebook\SocialPlugins\SendButton', $factory->createSendButton()),
    array('HostBox\Components\Facebook\SocialPlugins\ShareButton', $factory->createShareButton())
);

foreach ($cases as $case) {
    Tester\Assert::type($case[0], $case[1]);
}
