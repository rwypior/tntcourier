<?php

namespace RWypior\TNTCourier\Request;

use RWypior\TNTCourier\Model\PriceCheckMain;
use RWypior\TNTCourier\RequestInterface;
use RWypior\TNTCourier\XmlHelper;

class PricingRequest implements RequestInterface
{
    protected $dataset;

    public function __construct(PriceCheckMain $dataset)
    {
        $this->dataset = $dataset;
    }

    public function format()
    {
        $xml = XmlHelper::createBaseXml('PRICEREQUEST');

        $this->dataset->toXml($xml);

        return 'xml_in=' . $xml->saveXML();
    }

    public function getTarget()
    {
        return RequestInterface::TNT_URL . 'PriceGate.asp';
    }

    public function getExpectedResponse()
    {

    }

    public function getMethod()
    {
        return RequestInterface::METHOD_POST;
    }
}