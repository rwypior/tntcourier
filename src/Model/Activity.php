<?php

namespace RWypior\TNTCourier\Model;

class Activity
{
    private $create;
    private $ship;
    private $print;

    public function __construct(CreateActivity $ca = NULL, ShipActivity $sa = NULL, PrintActivity $pa = NULL)
    {
        $this->create = $ca ?: new CreateActivity();
        $this->ship = $sa ?: new ShipActivity();
        $this->print = $pa ?: new PrintActivity();
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $create = $parent->addChild('CREATE');
        $ship = $parent->addChild('SHIP');
        $print = $parent->addChild('PRINT');

        $this->create->toXml($create);
        $this->ship->toXml($ship);
        $this->print->toXml($print);
    }

    /**
     * @return CreateActivity
     */
    public function getCreate(): CreateActivity
    {
        return $this->create;
    }

    /**
     * @param CreateActivity $create
     * @return Activity
     */
    public function setCreate(CreateActivity $create): Activity
    {
        $this->create = $create;
        return $this;
    }

    /**
     * @return ShipActivity
     */
    public function getShip(): ShipActivity
    {
        return $this->ship;
    }

    /**
     * @param ShipActivity $ship
     * @return Activity
     */
    public function setShip(ShipActivity $ship): Activity
    {
        $this->ship = $ship;
        return $this;
    }

    /**
     * @return PrintActivity
     */
    public function getPrint(): PrintActivity
    {
        return $this->print;
    }

    /**
     * @param PrintActivity $print
     * @return Activity
     */
    public function setPrint(PrintActivity $print): Activity
    {
        $this->print = $print;
        return $this;
    }

}