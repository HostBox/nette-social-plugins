<?php

use HostBox\Components\Google\SocialPlugins;

require_once __DIR__ . '\bootstrap.php';


$factory = new SocialPlugins\GoogleFactory(
    $config = new SocialPlugins\Config()
);

$cases = array(
    array('HostBox\Components\Google\SocialPlugins\CommunityBadge', $factory->createCommunityBadge()),
    array('HostBox\Components\Google\SocialPlugins\PageBadge', $factory->createPageBadge()),
    array('HostBox\Components\Google\SocialPlugins\PlusOneButton', $factory->createPlusOneButton()),
    array('HostBox\Components\Google\SocialPlugins\ProfileBadge', $factory->createProfileBadge()),
    array('HostBox\Components\Google\SocialPlugins\ShareButton', $factory->createShareButton())
);

foreach ($cases as $case) {
    Tester\Assert::type($case[0], $case[1]);
}
