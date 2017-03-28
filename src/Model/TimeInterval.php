<?php

namespace RWypior\TNTCourier\Model;

class TimeInterval
{
    protected $from;
    protected $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('FROM', $this->from);
        $parent->addChild('TO', $this->to);
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return TimeInterval
     */
    public function setFrom(string $from): TimeInterval
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return TimeInterval
     */
    public function setTo(string $to): TimeInterval
    {
        $this->to = $to;
        return $this;
    }

}