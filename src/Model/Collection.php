<?php

namespace RWypior\TNTCourier\Model;

class Collection
{
    protected $shipDate;
    protected $prefCollectTime;
    protected $collectInstructions = '';

    public function __construct(\DateTime $shipDate = null, TimeInterval $prefCollTime = NULL)
    {
        if(null === $shipDate)
            $shipDate = new \DateTime();

        if (null === $prefCollTime)
            $this->prefCollectTime = new TimeInterval('09:00', '20:00');

        $this->shipDate = ($shipDate->format('d/m/Y'));
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('SHIPDATE', $this->shipDate);
        $prefcolltime = $parent->addChild('PREFCOLLECTTIME');
        $parent->addChild('COLLINSTRUCTIONS', $this->collectInstructions);

        $this->prefCollectTime->toXml($prefcolltime);
    }

    /**
     * @return string
     */
    public function getShipDate(): string
    {
        return $this->shipDate;
    }

    /**
     * @param string $shipDate
     * @return Collection
     */
    public function setShipDate(string $shipDate): Collection
    {
        $this->shipDate = $shipDate;
        return $this;
    }

    /**
     * @return TimeInterval
     */
    public function getPrefCollectTime(): TimeInterval
    {
        return $this->prefCollectTime;
    }

    /**
     * @param TimeInterval $prefCollectTime
     * @return Collection
     */
    public function setPrefCollectTime(TimeInterval $prefCollectTime): Collection
    {
        $this->prefCollectTime = $prefCollectTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getCollectInstructions(): string
    {
        return $this->collectInstructions;
    }

    /**
     * @param string $collectInstructions
     * @return Collection
     */
    public function setCollectInstructions(string $collectInstructions): Collection
    {
        $this->collectInstructions = $collectInstructions;
        return $this;
    }

}