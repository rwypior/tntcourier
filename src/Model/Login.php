<?php

namespace RWypior\TNTCourier\Model;

class Login
{
    const DEFAULT_APPID = 'EC';
    const DEFAULT_APPVERSION = '2.2';

    private $company;
    private $password;
    private $appId = self::DEFAULT_APPID;
    private $appVersion = self::DEFAULT_APPVERSION;

    public function __construct($company, $password)
    {
        $this->company = $company;
        $this->password = $password;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('COMPANY', $this->company);
        $parent->addChild('PASSWORD', $this->password);
        $parent->addChild('APPID', $this->appId);
        $parent->addChild('APPVERSION', $this->appVersion);
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     * @return Login
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Login
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppId(): string
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     * @return Login
     */
    public function setAppId(string $appId): Login
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAppVersion(): string
    {
        return $this->appVersion;
    }

    /**
     * @param string $appVersion
     * @return Login
     */
    public function setAppVersion(string $appVersion): Login
    {
        $this->appVersion = $appVersion;
        return $this;
    }
}