<?php

namespace RWypior\TNTCourier\Request;

use RWypior\TNTCourier\RequestInterface;
use RWypior\TNTCourier\Response\ResultResponse;

class ResultRequest implements RequestInterface
{
    protected $accessKey;

    public function __construct(string $accessKey)
    {
        $this->accessKey = $accessKey;
    }

    public function format()
    {
        return "xml_in=GET_RESULT:{$this->accessKey}";
    }

    public function getExpectedResponse()
    {
        return ResultResponse::class;
    }

    public function getMethod()
    {
        return RequestInterface::METHOD_POST;
    }

    public function getTarget()
    {
        return 'http://iConnection.tnt.com:81/ShipperGate2.asp';
    }
}