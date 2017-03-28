<?php

namespace RWypior\TNTCourier\Model;

class CreateActivity
{
    private $conref;

    public function __construct($conref = NULL)
    {
        $this->conref = $conref;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('CONREF', $this->conref);
    }

    /**
     * @return mixed
     */
    public function getConref()
    {
        return $this->conref;
    }

    /**
     * @param mixed $conref
     * @return CreateActivity
     */
    public function setConref($conref)
    {
        $this->conref = $conref;
        return $this;
    }

}