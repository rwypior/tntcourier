<?php

namespace RWypior\TNTCourier\Request;

use RWypior\TNTCourier\RequestInterface;
use RWypior\TNTCourier\Response\DocumentsResponse;

class InvoiceRequest implements RequestInterface
{
    protected $accessKey;

    public function __construct($accessKey)
    {
        $this->accessKey = $accessKey;
    }

    public function format()
    {
        return "xml_in=GET_INVOICE:{$this->accessKey}";
    }

    public function getTarget()
    {
        return 'http://iConnection.tnt.com:81/ShipperGate2.asp';
    }

    public function getExpectedResponse()
    {
        return DocumentsResponse::class;
    }

    public function getMethod()
    {
        return 'POST';
    }
}