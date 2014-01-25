<?php

namespace HostBox\Components;


interface ISocialPluginComponent {

    /**
     * @param array|null $settings
     * @return void
     */
    public function render($settings = array());

    /**
     * @return void
     */
    public function renderJsScript();

    /**
     * @param array $settings
     * @return void
     */
    public function assign(array $settings);

}
