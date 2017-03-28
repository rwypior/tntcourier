<?php

namespace RWypior\TNTCourier\Request;

use RWypior\TNTCourier\Model\Shipment;
use RWypior\TNTCourier\RequestInterface;
use RWypior\TNTCourier\Response\CreateShipmentResponse;
use RWypior\TNTCourier\XmlHelper;

class CreateShipmentRequest implements RequestInterface
{
    private $shipment;

    public function __construct(Shipment $shipment)
    {
        $this->shipment = $shipment;
    }

    public function format()
    {
        $xml = XmlHelper::createBaseXml('ESHIPPER');

        $this->shipment->toXml($xml);

        $newxml = XmlHelper::encodeDocument($xml);

        $request = 'xml_in=' . $newxml->saveXML();

        return $request;
    }

    public function getTarget()
    {
        return 'http://iConnection.tnt.com:81/ShipperGate2.asp';
    }

    public function getExpectedResponse()
    {
        return CreateShipmentResponse::class;
    }

    public function getMethod()
    {
        return RequestInterface::METHOD_POST;
    }


}