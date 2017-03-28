<?php

namespace RWypior\TNTCourier\Model;

class Shipment
{
    protected $login;
    protected $consignmentBatch;
    protected $activity;
    
    public function __construct(Login $login, ConsignmentBatch $consignmentBatch, Activity $activity = NULL)
    {
        $this->login = $login;
        $this->consignmentBatch = $consignmentBatch;
        $this->activity = $activity ?: new Activity();
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $login = $parent->addChild('LOGIN');
        $consignmentbatch = $parent->addChild('CONSIGNMENTBATCH');
        $activity = $parent->addChild('ACTIVITY');

        $this->login->toXml($login);
        $this->consignmentBatch->toXml($consignmentbatch);
        $this->activity->toXml($activity);
    }

    /**
     * @return Login
     */
    public function getLogin(): Login
    {
        return $this->login;
    }

    /**
     * @param Login $login
     * @return Shipment
     */
    public function setLogin(Login $login): Shipment
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return ConsignmentBatch
     */
    public function getConsignmentBatch(): ConsignmentBatch
    {
        return $this->consignmentBatch;
    }

    /**
     * @param ConsignmentBatch $consignmentBatch
     * @return Shipment
     */
    public function setConsignmentBatch(ConsignmentBatch $consignmentBatch): Shipment
    {
        $this->consignmentBatch = $consignmentBatch;
        return $this;
    }

    /**
     * @return Activity
     */
    public function getActivity(): Activity
    {
        return $this->activity;
    }

    /**
     * @param Activity $activity
     * @return Shipment
     */
    public function setActivity(Activity $activity): Shipment
    {
        $this->activity = $activity;
        return $this;
    }

}