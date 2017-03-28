<?php

include('../vendor/autoload.php');

$tnt = new \RWypior\TNTCourier\TNT();

$accessKey = ''; // obtained from CreateShipmentRequest

$request = new \RWypior\TNTCourier\Request\ResultRequest($accessKey);

$response = $tnt->sendRequest($request);

var_dump($response);