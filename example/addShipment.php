<?php

include('../vendor/autoload.php');

$tnt = new \RWypior\TNTCourier\TNT();

$builder = new \RWypior\TNTCourier\Util\ShipmentBuilder();
$shipment = $builder
    ->setLogin(new \RWypior\TNTCourier\Model\Login('login', 'password'))
    ->to(new \RWypior\TNTCourier\Model\Receiver('testłąś', 'test', 'test', 'test', '12345', 'test', '05', '123456'))
    ->from(new \RWypior\TNTCourier\Model\Sender('88216', 'test', 'test', 'test', 'test', '12345', 'test', '05', '123456'))
    ->setDescription('test')
    ->setConref('test1234')
    ->addArticle(new \RWypior\TNTCourier\Model\Article(1, 100.0, 'test'))
    ->getShipment();

$request = new \RWypior\TNTCourier\Request\CreateShipmentRequest($shipment);

$response = $tnt->sendRequest($request);

var_dump($response);