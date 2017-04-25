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

    private $deliveryInstructions = '';
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

    public function getDeliveryInstructions(): string
    {
        return $this->deliveryInstructions;
    }

    public function setDeliveryInstructions(string $deliveryInstructions)
    {
        $this->deliveryInstructions = $deliveryInstructions;
        return $this;
    }

    public function getTotalPrice()
    {
        $price = 0;
        foreach($this->articles as $article)
        {
            /** @var Article $article */
            $price += $article->getInvoiceValue();
        }
        return $price;
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

        $details->setDeliveryInst($this->deliveryInstructions);

        $shipment->getActivity()->getCreate()->setConref($this->conref);
        $shipment->getActivity()->getShip()->setConref($this->conref);
        $shipment->getActivity()->getPrint()->getConnote()->setConref($this->conref);
        $shipment->getActivity()->getPrint()->getLabel()->setConref($this->conref);
        $shipment->getActivity()->getPrint()->getManifest()->setConref($this->conref);
        $consignment->setConref($this->conref);

        $details->getPackage()->setArticles($this->articles);

        $details->setDescription($this->description);
        $details->getPackage()->setDescription($this->description);

        $details->setGoodsValue($this->getTotalPrice());

        return $shipment;
    }
}