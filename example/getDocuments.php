<?php

include('../vendor/autoload.php');

$tnt = new \RWypior\TNTCourier\TNT();

$accessKey = ''; // obtained from CreateShipmentRequest

$labelRequest = new \RWypior\TNTCourier\Request\LabelRequest($accessKey);
$labelResponse = $tnt->sendRequest($labelRequest);

$connoteRequest = new \RWypior\TNTCourier\Request\ConnoteRequest($accessKey);
$connoteResponse = $tnt->sendRequest($connoteRequest);

$invoiceRequest = new \RWypior\TNTCourier\Request\InvoiceRequest($accessKey);
$invoiceResponse = $tnt->sendRequest($invoiceRequest);

var_dump($labelResponse);
var_dump($connoteResponse);
var_dump($invoiceResponse);