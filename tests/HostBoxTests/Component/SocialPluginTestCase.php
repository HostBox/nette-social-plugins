<?php

namespace HostBoxTests\Component;

use HostBox\Components\ISocialPluginComponent;
use Nette\Application\Request;
use Nette\Application\UI\Presenter;
use Nette\Configurator;
use Tester;


abstract class SocialPluginTestCase extends Tester\TestCase {

    protected function renderComponent(ISocialPluginComponent $component, $settings = array()) {
        ob_start();
        $component->render($settings);

        return ob_get_clean();
    }

    /**
     * @param \HostBox\Components\ISocialPluginComponent
     * @throws \Nette\InvalidStateException
     * @throws \Nette\Application\UI\BadSignalException
     * @throws \Nette\UnexpectedValueException
     * @throws \Nette\InvalidArgumentException
     * @throws \Nette\Application\ForbiddenRequestException
     * @throws \Nette\Application\BadRequestException
     * @return MockPresenter
     */
    protected function connectButton(ISocialPluginComponent $button) {
        $container = $this->createContainer();

        /** @var MockPresenter $presenter */
        $presenter = $container->createInstance('HostBoxTests\Component\MockPresenter', array('button' => $button));
        $container->callInjects($presenter);
        $presenter->run(new Request('Mock', 'GET', array('action' => 'default'), array()));

        $presenter['button'];

        return $presenter;
    }

    /**
     * @return \SystemContainer
     * @throws \Nette\InvalidStateException
     */
    private function createContainer() {
        $config = new Configurator();
        $config->setTempDirectory(TEMP_DIR);

        return $config->createContainer();
    }

}

class MockPresenter extends Presenter {

    /** @var ISocialPluginComponent */
    private $button;


    public function __construct(ISocialPluginComponent $button) {
        $this->button = $button;
    }

    protected function beforeRender() {
        $this->terminate();
    }

    /**
     * @return ISocialPluginComponent
     */
    protected function createComponentButton() {
        return $this->button;
    }

}
