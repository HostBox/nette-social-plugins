<?php
namespace HostBox\Components\Facebook\SocialPlugins;

use Nette;

/**
 * Class Config
 * @package HostBox\Components\Facebook\SocialPlugins
 */
class Config extends Nette\Object {

    /** @var string */
    private $appId;

    /** @var bool */
    private $status;

    /** @var bool */
    private $xfbml;

    /** @var string */
    private $locale;

    /**
     * @param string $appId
     * @param bool $status
     * @param bool $xfbml
     * @param string $locale
     */
    public function __construct($appId, $status = TRUE, $xfbml = TRUE, $locale = 'cs_CZ') {
        $this->appId = $appId;
        $this->status = $status;
        $this->xfbml = $xfbml;
        $this->locale = $locale;
    }

    /**
     * @param string $appId
     */
    public function setAppId($appId) {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppId() {
        return $this->appId;
    }

    /**
     * @param string $locale
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
     * @param boolean $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return boolean
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param boolean $xfbml
     */
    public function setXfbml($xfbml) {
        $this->xfbml = $xfbml;
    }

    /**
     * @return boolean
     */
    public function getXfbml() {
        return $this->xfbml;
    }
}