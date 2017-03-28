<?php

namespace RWypior\TNTCourier\Model;

class Locality
{
    protected $country;
    protected $townName;
    protected $postCode;
    protected $townGroup;
    
    public function __construct($townName, $postCode, $townGroup, $country = 'RO')
    {
        $this->townName = $townName;
        $this->postCode = $postCode;
        $this->townGroup = $townGroup;
        $this->country = $country;
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
     * @return Locality
     */
    public function setCountry(string $country): Locality
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTownName()
    {
        return $this->townName;
    }

    /**
     * @param mixed $townName
     * @return Locality
     */
    public function setTownName($townName)
    {
        $this->townName = $townName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param mixed $postCode
     * @return Locality
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTownGroup()
    {
        return $this->townGroup;
    }

    /**
     * @param mixed $townGroup
     * @return Locality
     */
    public function setTownGroup($townGroup)
    {
        $this->townGroup = $townGroup;
        return $this;
    }

}

?>