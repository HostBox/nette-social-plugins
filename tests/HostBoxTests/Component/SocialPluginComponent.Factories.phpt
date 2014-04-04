<?php

namespace HostBoxTests\Component;

use HostBox\Components;
use HostBox\Components\Facebook\SocialPlugins\FacebookFactory;
use HostBox\Components\Google\SocialPlugins\GoogleFactory;
use HostBox\Components\LinkedIn\SocialPlugins\LinkedInFactory;
use HostBox\Components\Pinterest\SocialPlugins\PinterestFactory;
use HostBox\Components\Twitter\SocialPlugins\TwitterFactory;
use Tester;

require_once __DIR__ . '/../bootstrap.php';


class FactoriesTest extends Tester\TestCase {

    /** @var array */
    private $cases;


    protected function setUp() {
        $facebookFactory = new FacebookFactory(new Components\Facebook\SocialPlugins\Config('unknown'));
        $googleFactory = new GoogleFactory(new Components\Google\SocialPlugins\Config());
        $twitterFactory = new TwitterFactory(new Components\Twitter\SocialPlugins\Config());
        $pinterestFactory = new PinterestFactory();
        $linkedInFactory = new LinkedInFactory();

        $this->cases = array(
            'facebook' => array(
                array('HostBox\Components\Facebook\SocialPlugins\ActivityFeed', $facebookFactory->createActivityFeed()),
                array('HostBox\Components\Facebook\SocialPlugins\Comments', $facebookFactory->createComments()),
                array('HostBox\Components\Facebook\SocialPlugins\EmbeddedPost', $facebookFactory->createEmbeddedPost()),
                array('HostBox\Components\Facebook\SocialPlugins\Facepile', $facebookFactory->createFacepile()),
                array('HostBox\Components\Facebook\SocialPlugins\FollowButton', $facebookFactory->createFollowButton()),
                array('HostBox\Components\Facebook\SocialPlugins\LikeBox', $facebookFactory->createLikeBox()),
                array('HostBox\Components\Facebook\SocialPlugins\LikeButton', $facebookFactory->createLikeButton()),
                array('HostBox\Components\Facebook\SocialPlugins\SendButton', $facebookFactory->createSendButton()),
                array('HostBox\Components\Facebook\SocialPlugins\ShareButton', $facebookFactory->createShareButton())
            ),
            'google' => array(
                array('HostBox\Components\Google\SocialPlugins\CommunityBadge', $googleFactory->createCommunityBadge()),
                array('HostBox\Components\Google\SocialPlugins\PageBadge', $googleFactory->createPageBadge()),
                array('HostBox\Components\Google\SocialPlugins\PlusOneButton', $googleFactory->createPlusOneButton()),
                array('HostBox\Components\Google\SocialPlugins\ProfileBadge', $googleFactory->createProfileBadge()),
                array('HostBox\Components\Google\SocialPlugins\ShareButton', $googleFactory->createShareButton())
            ),
            'twitter' => array(
                array('HostBox\Components\Twitter\SocialPlugins\EmbeddedFavorites', $twitterFactory->createEmbeddedFavorites()),
                array('HostBox\Components\Twitter\SocialPlugins\EmbeddedSearch', $twitterFactory->createEmbeddedSearch()),
                array('HostBox\Components\Twitter\SocialPlugins\EmbeddedTimeline', $twitterFactory->createEmbeddedTimeline()),
                array('HostBox\Components\Twitter\SocialPlugins\FollowButton', $twitterFactory->createFollowButton()),
                array('HostBox\Components\Twitter\SocialPlugins\HashtagButton', $twitterFactory->createHashtagButton()),
                array('HostBox\Components\Twitter\SocialPlugins\MentionButton', $twitterFactory->createMentionButton()),
                array('HostBox\Components\Twitter\SocialPlugins\ShareButton', $twitterFactory->createShareButton())
            ),
            'linkedIn' => array(
                array('HostBox\Components\LinkedIn\SocialPlugins\ShareButton', $linkedInFactory->createShareButton()),
                array('HostBox\Components\LinkedIn\SocialPlugins\MemberProfile', $linkedInFactory->createMemberProfile()),
                array('HostBox\Components\LinkedIn\SocialPlugins\CompanyInsider', $linkedInFactory->createCompanyInsider()),
                array('HostBox\Components\LinkedIn\SocialPlugins\CompanyProfile', $linkedInFactory->createCompanyProfile()),
                array('HostBox\Components\LinkedIn\SocialPlugins\RecommendButton', $linkedInFactory->createRecommendButton())
            ),
            'pinterest' => array(
                array('HostBox\Components\Pinterest\SocialPlugins\FollowButton', $pinterestFactory->createFollowButton()),
                array('HostBox\Components\Pinterest\SocialPlugins\PinItButton', $pinterestFactory->createPinItButton()),
                array('HostBox\Components\Pinterest\SocialPlugins\PinWidget', $pinterestFactory->createPinWidget()),
                array('HostBox\Components\Pinterest\SocialPlugins\ProfileWidget', $pinterestFactory->createProfileWidget()),
                array('HostBox\Components\Pinterest\SocialPlugins\BoardWidget', $pinterestFactory->createBoardWidget())
            )
        );
    }

    public function testFacebook() {
        $this->check('facebook');
    }

    public function testGoogle() {
        $this->check('google');
    }

    public function testTwitter() {
        $this->check('twitter');
    }

    public function testLinkedIn() {
        $this->check('linkedIn');
    }

    public function testPinterest() {
        $this->check('pinterest');
    }

    private function  check($type) {
        foreach ($this->cases[$type] as $case) {
            Tester\Assert::type($case[0], $case[1]);
        }
    }

}

\run(new FactoriesTest());
