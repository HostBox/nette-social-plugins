Social Plugins for Nette Framework
===================


Support
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


Package Installation
-------------------

The best way to install Social Plugins is using [Composer](http://getcomposer.org/):

```sh
$ composer require hostbox/nette-component-social-plugins
```

[Packagist - Versions](https://packagist.org/packages/hostbox/nette-component-social-plugins)

or manual edit composer.json in your project

```json
    "require": {
        "hostbox/nette-component-social-plugins": "v1.1.0"
    },
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


**presenter**

```php
use HostBox\Components\Facebook\SocialPlugins\FacebookFactory;
use HostBox\Components\Google\SocialPlugins\GoogleFactory;
use HostBox\Components\Google\SocialPlugins\PlusOneButton;
use HostBox\Components\Twitter\SocialPlugins\FollowButton;
use HostBox\Components\Twitter\SocialPlugins\TwitterFactory;

class HomepagePresenter extends BasePresenter {

    /** @var FacebookFactory */
    protected $facebookFactory;

    /** @var TwitterFactory */
    protected $twitterFactory;

    /** @var GoogleFactory */
    protected $googleFactory;


    public function __construct(FacebookFactory $facebookFactory, TwitterFactory $twitterFactory, GoogleFactory $googleFactory) {
        $this->facebookFactory = $facebookFactory;
        $this->twitterFactory = $twitterFactory;
        $this->googleFactory = $googleFactory;
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
}
```

**template**


    {control facebookLikeButton}
    {control facebookLikeBox}
    {control twitterShareButton}
    {control googlePlusOneButton}

    {control twitterShareButton:jsScript}
    {control facebookLikeButton:jsScript}
    {control googlePlusOneButton:jsScript}
