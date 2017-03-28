<?php

namespace RWypior\TNTCourier\Request;

use RWypior\TNTCourier\AdvancedRequestInterface;
use RWypior\TNTCourier\Model\Tracking;
use RWypior\TNTCourier\Response\TrackResponse;
use RWypior\TNTCourier\XmlHelper;

class TrackRequest implements AdvancedRequestInterface
{
    const MAX_CONSIGNMENTS = 50;

    protected $tracking;

    public function __construct(Tracking $trackingData)
    {
        $this->tracking = $trackingData;
    }

    public function format()
    {
        $xml = XmlHelper::createBaseXml('TrackRequest');

        $this->tracking->toXml($xml);

        return 'xml_in=' . $xml->saveXML();
    }

    public function getTarget()
    {
        return 'https://express.tnt.com:443/expressconnect/track.do';
    }

    public function getHeaders()
    {
        return [
            'Authorization' => 'Basic ' . base64_encode("{$this->tracking->getLogin()->getCompany()}:{$this->tracking->getLogin()->getPassword()}")
        ];
    }

    public function getExpectedResponse()
    {
        return TrackResponse::class;
    }

    public function getMethod()
    {
        return 'POST';
    }


}