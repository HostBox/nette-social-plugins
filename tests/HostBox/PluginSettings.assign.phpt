<?php

use HostBox\Components\LinkedIn\SocialPlugins;

require_once __DIR__ . '/bootstrap.php';

class PluginSettingsTest extends Tester\TestCase {

    /** @var SocialPlugins\LinkedInFactory */
    private $factory;

    /** @var array */
    private $settings;

    public function setUp() {
        $this->factory = new SocialPlugins\LinkedInFactory;
        $this->settings = array(
            'counter' => SocialPlugins\ShareButton::COUNTER_TOP,
            'showZero' => FALSE
        );

    }

    public function testUpdateSettingsByFactoryAssign() {
        $plugin = $this->factory->createShareButton($this->settings);

        Tester\Assert::same(SocialPlugins\ShareButton::COUNTER_TOP, $plugin->counter);
        Tester\Assert::same(FALSE, $plugin->showZero);
    }

    public function testUpdateSettingsByPluginAssign() {
        $plugin = new SocialPlugins\ShareButton();
        $plugin->assign($this->settings);

        Tester\Assert::same(SocialPlugins\ShareButton::COUNTER_TOP, $plugin->counter);
        Tester\Assert::same(FALSE, $plugin->showZero);
    }

    public function testUpdateSettingsByPluginProperty() {
        $plugin = new SocialPlugins\ShareButton();
        $plugin->counter = SocialPlugins\ShareButton::COUNTER_NONE;

        Tester\Assert::same(SocialPlugins\ShareButton::COUNTER_NONE, $plugin->counter);
    }

}

\run(new PluginSettingsTest());
