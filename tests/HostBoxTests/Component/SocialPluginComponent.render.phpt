<?php

namespace HostBoxTests\Component;

use HostBox\Components\Facebook;
use HostBox\Components\Facebook\SocialPlugins\FacebookFactory;
use HostBox\Components\Facebook\SocialPlugins\LikeButton;
use HostBox\Components\Google;
use HostBox\Components\Google\SocialPlugins\GoogleFactory;
use HostBox\Components\LinkedIn;
use HostBox\Components\LinkedIn\SocialPlugins\LinkedInFactory;
use HostBox\Components\Twitter;
use HostBox\Components\Twitter\SocialPlugins\ShareButton;
use HostBox\Components\Twitter\SocialPlugins\TwitterFactory;
use Tester;

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/SocialPluginTestCase.php';


class ButtonRenderTest extends SocialPluginTestCase {

    /** @var FacebookFactory */
    private $facebookFactory;

    /** @var GoogleFactory */
    private $googleFactory;

    /** @var TwitterFactory */
    private $twitterFactory;

    /** @var LinkedInFactory */
    private $linkedInFactory;


    protected function setUp() {
        $this->facebookFactory = new FacebookFactory(new Facebook\SocialPlugins\Config('12345'));
        $this->googleFactory = new GoogleFactory(new Google\SocialPlugins\Config());
        $this->twitterFactory = new TwitterFactory(new Twitter\SocialPlugins\Config());
        $this->linkedInFactory = new LinkedInFactory();
    }

    public function testDefaultSettings() {
        $this->connectButton($likeButton = $this->facebookFactory->createLikeButton());
        Tester\Assert::match(
            '<div class="fb-like" data-action="like" data-colorscheme="light" data-layout="standard"></div>',
            $this->renderComponent($likeButton));

        $this->connectButton($plusOneButton = $this->googleFactory->createPlusOneButton());
        Tester\Assert::match(
            '<div class="g-plusone" data-size="standart" data-annotation="inline" data-align="left" data-recommendations="true" data-count="true"></div>',
            $this->renderComponent($plusOneButton));

        $this->connectButton($followButton = $this->twitterFactory->createFollowButton());
        Tester\Assert::match(
            '<a href="https://twitter.com/" class="twitter-follow-button" data-size="medium" data-show-count="false" data-show-screen-name="false" data-lang="cs">Follow</a>',
            $this->renderComponent($followButton));

        $this->connectButton($shareButton = $this->linkedInFactory->createShareButton());
        Tester\Assert::match(
            '<script type="IN/Share" data-counter="right" data-showzero="true"></script>',
            $this->renderComponent($shareButton));
    }

    public function testSettings() {
        $this->connectButton($likeButton = $this->facebookFactory->createLikeButton(
                array('href' => 'http://domain.tld', 'colorScheme' => LikeButton::COLOR_SCHEME_DARK))
        );
        Tester\Assert::match(
            '<div class="fb-like" data-action="like" data-colorscheme="dark" data-href="http://domain.tld" data-layout="standard"></div>',
            $this->renderComponent($likeButton));
    }

    public function testTemporarySettings() {
        $this->connectButton($shareButton = $this->twitterFactory->createShareButton());
        Tester\Assert::match(
            '<a href="https://twitter.com/share" class="twitter-share-button" data-size="large" data-count="horizontal" data-text="test text" data-lang="cs">Tweet</a>',
            $this->renderComponent($shareButton, array('size' => ShareButton::SIZE_LARGE, 'text' => 'test text')));

        Tester\Assert::match(
            '<a href="https://twitter.com/share" class="twitter-share-button" data-size="medium" data-count="horizontal" data-lang="cs">Tweet</a>',
            $this->renderComponent($shareButton));
    }

}

\run(new ButtonRenderTest());
