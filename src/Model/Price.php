<?php

namespace RWypior\TNTCourier\Model;

class Price
{
    protected $rateid;
    protected $service;
    protected $servicedesc;
    protected $option;
    protected $optiondesc;
    protected $currency;
    protected $rate;
    protected $result;
    
    public function __construct($rateid, $service, $servicedesc, $option, $optiondesc, $currency, $rate, $result)
    {
        $this->rateid = $rateid;
        $this->service = $service;
        $this->servicedesc = $servicedesc;
        $this->option = $option;
        $this->optiondesc = $optiondesc;
        $this->currency = $currency;
        $this->rate = $rate;
        $this->result = $result;
    }

    /**
     * @return mixed
     */
    public function getRateid()
    {
        return $this->rateid;
    }

    /**
     * @param mixed $rateid
     * @return Price
     */
    public function setRateid($rateid)
    {
        $this->rateid = $rateid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     * @return Price
     */
    public function setService($service)
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServicedesc()
    {
        return $this->servicedesc;
    }

    /**
     * @param mixed $servicedesc
     * @return Price
     */
    public function setServicedesc($servicedesc)
    {
        $this->servicedesc = $servicedesc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param mixed $option
     * @return Price
     */
    public function setOption($option)
    {
        $this->option = $option;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptiondesc()
    {
        return $this->optiondesc;
    }

    /**
     * @param mixed $optiondesc
     * @return Price
     */
    public function setOptiondesc($optiondesc)
    {
        $this->optiondesc = $optiondesc;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     * @return Price
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     * @return Price
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     * @return Price
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

}