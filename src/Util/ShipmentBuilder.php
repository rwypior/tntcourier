<?php

namespace RWypior\TNTCourier\Util;

use RWypior\TNTCourier\Model\Article;
use RWypior\TNTCourier\Model\Consignment;
use RWypior\TNTCourier\Model\ConsignmentBatch;
use RWypior\TNTCourier\Model\ConsignmentDetails;
use RWypior\TNTCourier\Model\Login;
use RWypior\TNTCourier\Model\Package;
use RWypior\TNTCourier\Model\Receiver;
use RWypior\TNTCourier\Model\Sender;
use RWypior\TNTCourier\Model\Shipment;

class ShipmentBuilder
{
    private $to;
    private $from;
    private $login;

    private $articles = [];

    private $description = '';
    private $conref = NULL;

    public function __construct()
    {

    }

    public function to(Receiver $to)
    {
        $this->to = $to;
        return $this;
    }

    public function from(Sender $sender)
    {
        $this->from = $sender;
        return $this;
    }

    public function setLogin(Login $login)
    {
        $this->login = $login;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setConref($conref)
    {
        $this->conref = $conref;
        return $this;
    }

    public function addArticle(Article $article)
    {
        $this->articles[] = $article;
        return $this;
    }

    public function getShipment()
    {
        $sender = $this->from;
        $receiver = $this->to;
        $package = new Package();
        $details = new ConsignmentDetails($receiver, $package);
        $consignment = new Consignment($details);
        $batch = new ConsignmentBatch($sender, $consignment);

        $shipment = new Shipment($this->login, $batch);

        $shipment->getActivity()->getCreate()->setConref($this->conref);
        $shipment->getActivity()->getShip()->setConref($this->conref);
        $shipment->getActivity()->getPrint()->getConnote()->setConref($this->conref);
        $shipment->getActivity()->getPrint()->getLabel()->setConref($this->conref);
        $shipment->getActivity()->getPrint()->getManifest()->setConref($this->conref);
        $consignment->setConref($this->conref);

        $details->getPackage()->setArticles($this->articles);

        $details->setDescription($this->description);
        $details->getPackage()->setDescription($this->description);

        return $shipment;
    }
}