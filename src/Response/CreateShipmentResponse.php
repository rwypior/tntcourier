<?php

namespace RWypior\TNTCourier\Response;

use RWypior\TNTCourier\Exception\CourierException;
use RWypior\TNTCourier\ResponseInterface;

class CreateShipmentResponse implements ResponseInterface
{
    private $accessCode;

    protected function __construct($accessCode)
    {
        $this->accessCode = $accessCode;
    }

    public static function createResponse($data) : ResponseInterface
    {
        $expl = explode(':', $data);

        if ($expl[0] != 'COMPLETE')
            throw new CourierException('Failed to add consignment');

        return new CreateShipmentResponse($expl[1]);
    }

    public function getAccessCode()
    {
        return $this->accessCode;
    }
}