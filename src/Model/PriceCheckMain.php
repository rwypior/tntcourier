<?php

namespace RWypior\TNTCourier\Model;

class PriceCheckMain
{
    protected $login;
    protected $datasets;
    protected $priceCheck;
    
    public function __construct(Login $login, PriceCheck $priceCheck, Datasets $datasets = NULL)
    {
        if (!$datasets)
            $datasets = new Datasets();

        $this->login = $login;
        $this->priceCheck = $priceCheck;
        $this->datasets = $datasets;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $login = $parent->addChild('LOGIN');
        $datasets = $parent->addChild('DATASETS');
        $priceCheck = $parent->addChild('PRICECHECK');

        $this->login->toXml($login);
        $this->datasets->toXml($datasets);
        $this->priceCheck->toXml($priceCheck);
    }

    /**
     * @return Login
     */
    public function getLogin(): Login
    {
        return $this->login;
    }

    /**
     * @param Login $login
     * @return PriceCheckMain
     */
    public function setLogin(Login $login): PriceCheckMain
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatasets()
    {
        return $this->datasets;
    }

    /**
     * @param mixed $datasets
     * @return PriceCheckMain
     */
    public function setDatasets($datasets)
    {
        $this->datasets = $datasets;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPriceCheck()
    {
        return $this->priceCheck;
    }

    /**
     * @param mixed $priceCheck
     * @return PriceCheckMain
     */
    public function setPriceCheck($priceCheck)
    {
        $this->priceCheck = $priceCheck;
        return $this;
    }

}