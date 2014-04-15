Social Plugins for Nette Framework [![Build Status](https://travis-ci.org/HostBox/nette-social-plugins.png)](https://travis-ci.org/HostBox/nette-socialPlugins)
===================


Support for Facebook, Twitter, Google+, LinkedIn and Pinterest
-------------------

**Facebook:**

- Activity feed
- Comments
- Embedded post
- Facepile
- Follow button
- Like box
- Like button
- Send button
- Share button

**Twitter:**

- Follow button
- Hashtag button
- Mention button
- Share button
- Embedded timeline
- Embedded favorites
- Embedded search

**Google+:**

- +1 button
- Share button
- Profile badge
- Page badge
- Community badge

**LinkedIn:**

- Company insider
- Company profile
- Member profile
- Share button
- Recommend button

**Pinterest:**

- Pin It button
- Follow button
- Pin widget
- Profile widget
- Board widget

Package Installation
-------------------

The best way to install Social Plugins is using [Composer](http://getcomposer.org/):

```sh
$ composer require hostbox/nette-component-social-plugins
```

[Packagist - Versions](https://packagist.org/packages/hostbox/nette-component-social-plugins)

[Nette Forum (cs) - plugin section](http://forum.nette.org/cs/16220-social-plugins-facebook-twitter-a-g)

[Nette Addons](http://addons.nette.org/hostbox/nette-component-social-plugins)

or manual edit composer.json in your project

```json
"require": {
    "hostbox/nette-component-social-plugins": "v1.5.0"
}
```

Component Installation
-------------------

**config.neon**

    services:
        # Configs
        - HostBox\Components\Facebook\SocialPlugins\Config('facebookAppId')
        - HostBox\Components\Twitter\SocialPlugins\Config
        - HostBox\Components\Google\SocialPlugins\Config
        # Factories
        - HostBox\Components\Facebook\SocialPlugins\FacebookFactory
        - HostBox\Components\Twitter\SocialPlugins\TwitterFactory
        - HostBox\Components\Google\SocialPlugins\GoogleFactory
        - HostBox\Components\Pinterest\SocialPlugins\PinterestFactory


**Presenter**

```php
use HostBox\Components\Facebook\SocialPlugins\LikeBox;
use HostBox\Components\Google\SocialPlugins\GoogleFactory;
use HostBox\Components\Google\SocialPlugins\PlusOneButton;
use HostBox\Components\Pinterest\SocialPlugins\PinItButton;
use HostBox\Components\Pinterest\SocialPlugins\PinterestFactory;
use HostBox\Components\Twitter\SocialPlugins\FollowButton;
use HostBox\Components\Twitter\SocialPlugins\TwitterFactory;

class HomepagePresenter extends BasePresenter {

    /** @var FacebookFactory */
    protected $facebookFactory;

    /** @var TwitterFactory */
    protected $twitterFactory;

    /** @var GoogleFactory */
    protected $googleFactory;

    /** @var PinterestFactory */
    protected $pinterestFactory;

    /**
     * @var LinkedInFactory
     * @inject
     */
    public $linkedInFactory;

    public function __construct(FacebookFactory $facebookFactory, TwitterFactory $twitterFactory, GoogleFactory $googleFactory, PinterestFactory $pinterestFactory) {
        $this->facebookFactory = $facebookFactory;
        $this->twitterFactory = $twitterFactory;
        $this->googleFactory = $googleFactory;
        $this->pinterestFactory = $pinterestFactory;
    }

    // component create by Factory
    public function createComponentFacebookLikeButton() {
        return $this->facebookFactory->createLikeButton();
    }

    // default settings by factory function parameter
    public function createComponentFacebookLikeBox() {
        return $this->facebookFactory->createLikeBox(array(
            'colorScheme' => LikeBox::COLOR_SCHEME_DARK,
            'showFaces' => TRUE
        ));
    }

    // by component function parameter
    public function createComponentTwitterShareButton() {
        $component = $this->twitterFactory->createFollowButton();
        $component->assign(array(
            'size' => FollowButton::SIZE_LARGE,
            'showCount' => TRUE
        ));

        return $component;
    }

    // by component variable
    public function createComponentGooglePlusOneButton() {
        $component = $this->googleFactory->createPlusOneButton();
        $component->size = PlusOneButton::SIZE_SMALL;

        return $component;
    }

    public function createComponentLinkedInShareButton() {
        return $this->linkedInFactory->createShareButton();
    }

    public function createComponentPinterestFollowButton() {
        return $this->pinterestFactory->createFollowButton(array(
            'userName' => 'pinterest',
            'text' => 'Pinterest'
        ));
    }
}
```

**Template**


    {control facebookLikeButton}

    // temporary(only for this render) settings editing in Template
    {control facebookLikeButton, layout => 'box_count', showFaces => true}

    {control facebookLikeBox}
    {control twitterShareButton}
    {control googlePlusOneButton}
    {control linkedInShareButton}
    {control pinterestFollowButton}

    {control facebookLikeButton:jsScript}
    {control twitterShareButton:jsScript}
    {control googlePlusOneButton:jsScript}
    {control linkedInShareButton:jsScript}
    {control pinterestFollowButton:jsScript}
