<?php

namespace RWypior\TNTCourier\Exception;

use RWypior\TNTCourier\RequestInterface;
use Throwable;

class CourierException extends \Exception
{
    const EXCCODE_UNKNOWN_ERROR = 0;
    const EXCCODE_REQUEST_FAILED = 1;
    const EXCCODE_CONNECTION_FAILED = 2;

    public $request;

    public function __construct(
        string $message = "",
        int $code = 0,
        Throwable $previous = NULL,
        RequestInterface $request = NULL
    )
    {
        $this->request = $request;
        parent::__construct($message, $code, $previous);
    }
}