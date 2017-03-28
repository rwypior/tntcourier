<?php

namespace RWypior\TNTCourier\Exception;

class CourierException extends \Exception
{
    const EXCCODE_UNKNOWN_ERROR = 0;
    const EXCCODE_REQUEST_FAILED = 1;
    const EXCCODE_CONNECTION_FAILED = 2;
}

?>