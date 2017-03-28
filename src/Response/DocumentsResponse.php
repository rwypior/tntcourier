<?php

namespace RWypior\TNTCourier\Response;

use RWypior\TNTCourier\Exception\CourierException;
use RWypior\TNTCourier\ResponseInterface;

class DocumentsResponse implements ResponseInterface
{
    protected $content;

    protected function __construct($content)
    {
        $this->content = $content;
    }

    public static function createResponse($data) : ResponseInterface
    {
        return new DocumentsResponse($data);
    }

    public function getContent()
    {
        return $this->content;
    }
}