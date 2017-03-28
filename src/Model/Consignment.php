<?php

namespace RWypior\TNTCourier\Model;

class Consignment
{
    protected $conref;
    protected $details;

    public function __construct(ConsignmentDetails $details, $conref = NULL)
    {
        $this->details = $details;
        $this->conref = $conref;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('CONREF', $this->conref);
        $details = $parent->addChild('DETAILS');

        $this->details->toXml($details);
    }

    /**
     * @return null
     */
    public function getConref()
    {
        return $this->conref;
    }

    /**
     * @param null $conref
     * @return Consignment
     */
    public function setConref($conref)
    {
        $this->conref = $conref;
        return $this;
    }

    /**
     * @return ConsignmentDetails
     */
    public function getDetails(): ConsignmentDetails
    {
        return $this->details;
    }

    /**
     * @param ConsignmentDetails $details
     * @return Consignment
     */
    public function setDetails(ConsignmentDetails $details): Consignment
    {
        $this->details = $details;
        return $this;
    }

}