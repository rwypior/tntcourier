<?php

namespace RWypior\TNTCourier\Model;

class PrintLabelActivity
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
     * @return ShipActivity
     */
    public function setConref($conref)
    {
        $this->conref = $conref;
        return $this;
    }
    
}