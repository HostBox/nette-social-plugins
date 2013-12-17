<?php

use HostBox\Components\Pinterest\SocialPlugins;

require_once __DIR__ . '\bootstrap.php';


$factory = new SocialPlugins\PinterestFactory;

$cases = array(
    array('HostBox\Components\Pinterest\SocialPlugins\FollowButton', $factory->createFollowButton()),
    array('HostBox\Components\Pinterest\SocialPlugins\PinItButton', $factory->createPinItButton()),
    array('HostBox\Components\Pinterest\SocialPlugins\PinWidget', $factory->createPinWidget()),
    array('HostBox\Components\Pinterest\SocialPlugins\ProfileWidget', $factory->createProfileWidget()),
    array('HostBox\Components\Pinterest\SocialPlugins\BoardWidget', $factory->createBoardWidget())
);

foreach ($cases as $case) {
    Tester\Assert::type($case[0], $case[1]);
}
