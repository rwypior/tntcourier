<?php

namespace RWypior\TNTCourier\Model;

class Status
{
    const STATUS_IN_TRANSIT = 'INT';
    const STATUS_NOT_FOUND = 'CNF';
    const STATUS_DELIVERED = 'DEL';
    const STATUS_EXCEPTION = 'EXC';

    protected $number;
    protected $status;

    public function __construct($number, $status)
    {
        $this->number = $number;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return Status
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function isDelivered()
    {
        return $this->status == self::STATUS_DELIVERED;
    }

}