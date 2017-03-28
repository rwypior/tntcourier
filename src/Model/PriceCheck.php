<?php

namespace RWypior\TNTCourier\Model;

class PriceCheck
{
    protected $rateId = 1;
    protected $originLocality;
    protected $targetLocality;
    protected $conType = 'N';
    protected $currency = 'RON';
    protected $weight;
    protected $volume;
    protected $account;
    protected $items = 1;
    protected $service = '15N';
    
    public function __construct(Locality $origin, Locality $target)
    {
        $this->originLocality = $origin;
        $this->targetLocality = $target;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('RATEID', $this->rateId);
        $parent->addChild('ORIGINCOUNTRY', $this->originLocality->getCountry());
        $parent->addChild('ORIGINTOWNNAME', $this->originLocality->getTownName());
        $parent->addChild('ORIGINPOSTCODE', $this->originLocality->getPostCode());
        $parent->addChild('ORIGINTOWNGROUP', $this->originLocality->getTownGroup());
        $parent->addChild('DESTCOUNTRY', $this->targetLocality->getCountry());
        $parent->addChild('DESTTOWNNAME', $this->targetLocality->getTownName());
        $parent->addChild('DESTPOSTCODE', $this->targetLocality->getPostCode());
        $parent->addChild('DESTTOWNGROUP', $this->targetLocality->getTownGroup());
        $parent->addChild('CONTYPE', $this->conType);
        $parent->addChild('CURRENCY', $this->currency);
        $parent->addChild('WEIGHT', $this->weight);
        $parent->addChild('VOLUME', $this->volume);
        $parent->addChild('ACCOUNT', $this->account);
        $parent->addChild('ITEMS', $this->items);
        $parent->addChild('SERVICE', $this->service);
    }

    /**
     * @return int
     */
    public function getRateId(): int
    {
        return $this->rateId;
    }

    /**
     * @param int $rateId
     * @return PriceCheck
     */
    public function setRateId(int $rateId): PriceCheck
    {
        $this->rateId = $rateId;
        return $this;
    }

    /**
     * @return Locality
     */
    public function getOriginLocality(): Locality
    {
        return $this->originLocality;
    }

    /**
     * @param Locality $originLocality
     * @return PriceCheck
     */
    public function setOriginLocality(Locality $originLocality): PriceCheck
    {
        $this->originLocality = $originLocality;
        return $this;
    }

    /**
     * @return Locality
     */
    public function getTargetLocality(): Locality
    {
        return $this->targetLocality;
    }

    /**
     * @param Locality $targetLocality
     * @return PriceCheck
     */
    public function setTargetLocality(Locality $targetLocality): PriceCheck
    {
        $this->targetLocality = $targetLocality;
        return $this;
    }

    /**
     * @return string
     */
    public function getConType(): string
    {
        return $this->conType;
    }

    /**
     * @param string $conType
     * @return PriceCheck
     */
    public function setConType(string $conType): PriceCheck
    {
        $this->conType = $conType;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return PriceCheck
     */
    public function setCurrency(string $currency): PriceCheck
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     * @return PriceCheck
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param mixed $volume
     * @return PriceCheck
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     * @return PriceCheck
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @return int
     */
    public function getItems(): int
    {
        return $this->items;
    }

    /**
     * @param int $items
     * @return PriceCheck
     */
    public function setItems(int $items): PriceCheck
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return PriceCheck
     */
    public function setService(string $service): PriceCheck
    {
        $this->service = $service;
        return $this;
    }

}