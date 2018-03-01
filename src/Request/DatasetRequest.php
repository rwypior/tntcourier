<?php

namespace RWypior\TNTCourier\Request;

use RWypior\TNTCourier\RequestInterface;
use RWypior\TNTCourier\XmlHelper;

class DatasetRequest implements RequestInterface
{
    protected $request;

    public function __construct(\RWypior\TNTCourier\Model\DatasetRequest $request)
    {
        $this->request = $request;
    }

    public function format()
    {
        $xml = XmlHelper::createBaseXml('SETREQUEST');

        $this->request->toXml($xml);

        return 'xml_in=' . $xml->saveXML();
    }

    public function getTarget()
    {
        return RequestInterface::TNT_URL . 'PriceGate.asp';
    }

    public function getExpectedResponse()
    {
        // TODO: Implement getExpectedResponse() method.
    }

    public function getMethod()
    {
        return 'POST';
    }

}