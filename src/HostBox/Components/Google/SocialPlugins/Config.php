<?php

namespace HostBox\Components\Google\SocialPlugins;

use Nette;


class Config extends Nette\Object {

    const
        PARSETAG_ONLOAD = 'onload',
        PARSETAG_EXPLICIT = 'explicit';

    /** @var string */
    private $locale;

    /** @var string */
    private $parsetags;


    /**
     * @param string $locale
     * @param string $parsetags
     */
    public function __construct($locale = 'cs', $parsetags = self::PARSETAG_ONLOAD) {
        $this->locale = $locale;
        $this->parsetags = $parsetags;
    }

    /**
     * @param string $locale
     * @return void
     */
    public function setLocale($locale) {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getLocale() {
        return $this->locale;
    }

    /**
     * @param string $parsetags
     * @return void
     */
    public function setParsetags($parsetags) {
        $this->parsetags = $parsetags;
    }

    /**
     * @return string
     */
    public function getParsetags() {
        return $this->parsetags;
    }

}
