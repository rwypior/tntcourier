<?php

namespace RWypior\TNTCourier\Model;

class Datasets
{
    protected $country;
    protected $currency;
    protected $postCodeMask;
    protected $townGroup;
    protected $service;
    protected $option;
    
    public function __construct($country = '1.3', $currency = '1.2', $postCodeMask = '1.2', $townGroup = '1.2', $service = '1.3', $option = '1.2')
    {
        $this->country = $country;
        $this->currency = $currency;
        $this->postCodeMask = $postCodeMask;
        $this->townGroup = $townGroup;
        $this->service = $service;
        $this->option = $option;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('COUNTRY', $this->country);
        $parent->addChild('CURRENCY', $this->currency);
        $parent->addChild('POSTCODEMASK', $this->postCodeMask);
        $parent->addChild('TOWNGROUP', $this->townGroup);
        $parent->addChild('SERVICE', $this->service);
        $parent->addChild('OPTION', $this->option);
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Datasets
     */
    public function setCountry(string $country): Datasets
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Datasets
     */
    public function setCurrency(string $currency): Datasets
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostCodeMask(): string
    {
        return $this->postCodeMask;
    }

    /**
     * @param string $postCodeMask
     * @return Datasets
     */
    public function setPostCodeMask(string $postCodeMask): Datasets
    {
        $this->postCodeMask = $postCodeMask;
        return $this;
    }

    /**
     * @return string
     */
    public function getTownGroup(): string
    {
        return $this->townGroup;
    }

    /**
     * @param string $townGroup
     * @return Datasets
     */
    public function setTownGroup(string $townGroup): Datasets
    {
        $this->townGroup = $townGroup;
        return $this;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return Datasets
     */
    public function setService(string $service): Datasets
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return string
     */
    public function getOption(): string
    {
        return $this->option;
    }

    /**
     * @param string $option
     * @return Datasets
     */
    public function setOption(string $option): Datasets
    {
        $this->option = $option;
        return $this;
    }

}