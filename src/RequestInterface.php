<?php

namespace RWypior\TNTCourier;

interface RequestInterface
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    public function getExpectedResponse();

    public function format();

    public function getTarget();

    public function getMethod();
}