<?php

use HostBox\Components\LinkedIn\SocialPlugins;

require_once __DIR__ . '\bootstrap.php';


$factory = new SocialPlugins\LinkedInFactory();

$cases = array(
    array('HostBox\Components\LinkedIn\SocialPlugins\ShareButton', $factory->createShareButton()),
    array('HostBox\Components\LinkedIn\SocialPlugins\MemberProfile', $factory->createMemberProfile()),
    array('HostBox\Components\LinkedIn\SocialPlugins\CompanyInsider', $factory->createCompanyInsider()),
    array('HostBox\Components\LinkedIn\SocialPlugins\CompanyProfile', $factory->createCompanyProfile()),
    array('HostBox\Components\LinkedIn\SocialPlugins\RecommendButton', $factory->createRecommendButton())
);

foreach ($cases as $case) {
    Tester\Assert::type($case[0], $case[1]);
}
