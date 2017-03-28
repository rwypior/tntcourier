<?php

namespace RWypior\TNTCourier;

interface ResponseInterface
{
    /**
     * Create response object
     * @param string $data raw response text
     * @return ResponseInterface
     */
    public static function createResponse($data) : ResponseInterface;
}