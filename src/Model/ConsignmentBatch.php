<?php

namespace RWypior\TNTCourier\Model;

class ConsignmentBatch
{
    protected $sender;
    protected $consignment;

    public function __construct(Sender $sender, Consignment $consignment)
    {
        $this->sender = $sender;
        $this->consignment = $consignment;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $sender = $parent->addChild('SENDER');
        $consignment = $parent->addChild('CONSIGNMENT');

        $this->sender->toXml($sender);
        $this->consignment->toXml($consignment);
    }

    /**
     * @return Sender
     */
    public function getSender(): Sender
    {
        return $this->sender;
    }

    /**
     * @param Sender $sender
     * @return ConsignmentBatch
     */
    public function setSender(Sender $sender): ConsignmentBatch
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @return Consignment
     */
    public function getConsignment(): Consignment
    {
        return $this->consignment;
    }

    /**
     * @param Consignment $consignment
     * @return ConsignmentBatch
     */
    public function setConsignment(Consignment $consignment): ConsignmentBatch
    {
        $this->consignment = $consignment;
        return $this;
    }

}