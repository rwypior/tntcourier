<?php

namespace RWypior\TNTCourier\Model;

class Tracking
{
    protected $login;
    protected $numbers;

    public function __construct(Login $login, array $numbers)
    {
        $this->login = $login;
        $this->numbers = $numbers;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $root = $parent->addChild('SearchCriteria');

        foreach($this->numbers as $number)
        {
            $root->addChild('ConsignmentNumber', $number);
        }
    }

    /**
     * @return array
     */
    public function getNumbers(): array
    {
        return $this->numbers;
    }

    /**
     * @param array $numbers
     * @return Tracking
     */
    public function setNumbers(array $numbers): Tracking
    {
        $this->numbers = $numbers;
        return $this;
    }

    /**
     * @param $number
     * @return Tracking
     */
    public function addNumber($number): Tracking
    {
        $this->numbers[] = $number;
        return $this;
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
     * @return Tracking
     */
    public function setLogin(Login $login): Tracking
    {
        $this->login = $login;
        return $this;
    }

}