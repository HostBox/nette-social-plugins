<?php

namespace HostBox\Components;

/**
 * Interface ISocialPluginComponent
 * @package HostBox\Components
 */
interface ISocialPluginComponent {

    /**
     * @param array|null $settings
     */
    public function render($settings = array());

    public function renderJsScript();

    /**
     * @param array $settings
     */
    public function assign(array $settings);

}
