<?php

namespace RWypior\TNTCourier\Request;

use RWypior\TNTCourier\RequestInterface;
use RWypior\TNTCourier\Response\DocumentsResponse;

class ManifestRequest implements RequestInterface
{
    private $accessKey;

    public function __construct(string $accessKey)
    {
        $this->accessKey = $accessKey;
    }

    public function getExpectedResponse()
    {
        return DocumentsResponse::class;
    }

    public function getMethod()
    {
        return RequestInterface::METHOD_POST;
    }

    public function format()
    {
        return "xml_in=GET_MANIFEST:{$this->accessKey}";
    }

    public function getTarget()
    {
        return 'http://iConnection.tnt.com:81/ShipperGate2.asp';
    }
}