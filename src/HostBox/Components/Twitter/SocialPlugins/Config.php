<?php
namespace HostBox\Components\Twitter\SocialPlugins;

use Nette;

/**
 * Class Config
 * @package HostBox\Components\Twitter\SocialPlugins
 */
class Config extends Nette\Object {

    /**
     * ISO-639-1 format
     * @var string
     */
    private $lang;

    /**
     * @param $lang
     */
    public function __construct($lang = 'cs') {
        $this->lang = $lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang) {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang() {
        return $this->lang;
    }

}
