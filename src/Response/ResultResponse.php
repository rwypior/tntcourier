<?php

namespace RWypior\TNTCourier\Response;

use RWypior\TNTCourier\Exception\CourierException;
use RWypior\TNTCourier\ResponseInterface;

class ResultResponse implements ResponseInterface
{
    protected $connumber;

    public function __construct($connumber)
    {
        $this->connumber = $connumber;
    }

    public static function createResponse($data) : ResponseInterface
    {
        try
        {
            $xml = new \SimpleXMLElement($data);
        }
        catch (\Exception $ex)
        {
            throw new CourierException('Failed to parse response XML');
        }

        $res = $xml->xpath('/document/CREATE/CONNUMBER');

        if (isset($res[0]))
            return new ResultResponse($res[0]->__toString());

        $res = $xml->xpath('/document/ERROR/DESCRIPTION');
        if (isset($res[0]))
            throw new CourierException($res[0]->__toString());

        throw new CourierException('Failed to parse response XML');
    }

    public function getConNumber()
    {
        return $this->connumber;
    }
}