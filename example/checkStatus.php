<?php

include('../vendor/autoload.php');

$tnt = new \RWypior\TNTCourier\TNT();

$login = new \RWypior\TNTCourier\Model\Login('login', 'password');
$tracking = new \RWypior\TNTCourier\Model\Tracking($login, ['PARCELNUMBER']);

$request = new \RWypior\TNTCourier\Request\TrackRequest($tracking);

$response = $tnt->sendRequest($request);

var_dump($response);