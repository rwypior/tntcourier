<?php

namespace RWypior\TNTCourier\Model;

class ConsignmentDetails
{
    const DEFAULT_SERVICE = '15N';

    const DEFAULT_OPTION = 'CO';

    protected $receiver;
    protected $customerRef = 'TEST';
    protected $conType = 'N';
    protected $paymentInd = 'S';
    protected $items = 1;
    protected $totalWeight = 0.5;
    protected $totalVolume = 0.00315;
    protected $currency = 'RON';
    protected $goodsValue = 249.90;
    protected $service = self::DEFAULT_SERVICE;
    protected $option = self::DEFAULT_OPTION;
    protected $description = '';
    protected $deliveryInst = '';
    protected $customControlIn = 'N';
    protected $hazardous = 'N';
    protected $unNumber = '0000';
    protected $package;

    public function __construct(Receiver $receiver, Package $package)
    {
        $this->receiver = $receiver;
        $this->package = $package;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $receiver = $parent->addChild('RECEIVER');
        $parent->addChild('CUSTOMERREF', $this->customerRef);
        $parent->addChild('CONTYPE', $this->conType);
        $parent->addChild('PAYMENTIND', $this->paymentInd);
        $parent->addChild('ITEMS', $this->items);
        $parent->addChild('TOTALWEIGHT', $this->totalWeight);
        $parent->addChild('TOTALVOLUME', $this->totalVolume);
        $parent->addChild('CURRENCY', $this->currency);
        $parent->addChild('GOODSVALUE', $this->goodsValue);
        $parent->addChild('SERVICE', $this->service);
        $parent->addChild('OPTION', $this->option);
        $parent->addChild('DESCRIPTION', $this->description);
        $parent->addChild('DELIVERYINST', $this->deliveryInst);
        $parent->addChild('CUSTOMCONTROLIN', $this->customControlIn);
        $parent->addChild('HAZARDOUS', $this->hazardous);
        $parent->addChild('UNNUMBER', $this->unNumber);
        $package = $parent->addChild('PACKAGE');

        $this->receiver->toXml($receiver);
        $this->package->toXml($package);
    }

    /**
     * @return Receiver
     */
    public function getReceiver(): Receiver
    {
        return $this->receiver;
    }

    /**
     * @param Receiver $receiver
     * @return ConsignmentDetails
     */
    public function setReceiver(Receiver $receiver): ConsignmentDetails
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerRef(): string
    {
        return $this->customerRef;
    }

    /**
     * @param string $customerRef
     * @return ConsignmentDetails
     */
    public function setCustomerRef(string $customerRef): ConsignmentDetails
    {
        $this->customerRef = $customerRef;
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
     * @return ConsignmentDetails
     */
    public function setConType(string $conType): ConsignmentDetails
    {
        $this->conType = $conType;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentInd(): string
    {
        return $this->paymentInd;
    }

    /**
     * @param string $paymentInd
     * @return ConsignmentDetails
     */
    public function setPaymentInd(string $paymentInd): ConsignmentDetails
    {
        $this->paymentInd = $paymentInd;
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
     * @return ConsignmentDetails
     */
    public function setItems(int $items): ConsignmentDetails
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalWeight(): float
    {
        return $this->totalWeight;
    }

    /**
     * @param float $totalWeight
     * @return ConsignmentDetails
     */
    public function setTotalWeight(float $totalWeight): ConsignmentDetails
    {
        $this->totalWeight = $totalWeight;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalVolume(): float
    {
        return $this->totalVolume;
    }

    /**
     * @param float $totalVolume
     * @return ConsignmentDetails
     */
    public function setTotalVolume(float $totalVolume): ConsignmentDetails
    {
        $this->totalVolume = $totalVolume;
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
     * @return ConsignmentDetails
     */
    public function setCurrency(string $currency): ConsignmentDetails
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return float
     */
    public function getGoodsValue(): float
    {
        return $this->goodsValue;
    }

    /**
     * @param float $goodsValue
     * @return ConsignmentDetails
     */
    public function setGoodsValue(float $goodsValue): ConsignmentDetails
    {
        $this->goodsValue = $goodsValue;
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
     * @return ConsignmentDetails
     */
    public function setService(string $service): ConsignmentDetails
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return string
     */
    public function getOption(): string
    {
        return $this->option;
    }

    /**
     * @param string $option
     * @return ConsignmentDetails
     */
    public function setOption(string $option): ConsignmentDetails
    {
        $this->option = $option;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ConsignmentDetails
     */
    public function setDescription(string $description): ConsignmentDetails
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryInst(): string
    {
        return $this->deliveryInst;
    }

    /**
     * @param string $deliveryInst
     * @return ConsignmentDetails
     */
    public function setDeliveryInst(string $deliveryInst): ConsignmentDetails
    {
        $this->deliveryInst = $deliveryInst;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomControlIn(): string
    {
        return $this->customControlIn;
    }

    /**
     * @param string $customControlIn
     * @return ConsignmentDetails
     */
    public function setCustomControlIn(string $customControlIn): ConsignmentDetails
    {
        $this->customControlIn = $customControlIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getHazardous(): string
    {
        return $this->hazardous;
    }

    /**
     * @param string $hazardous
     * @return ConsignmentDetails
     */
    public function setHazardous(string $hazardous): ConsignmentDetails
    {
        $this->hazardous = $hazardous;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnNumber(): string
    {
        return $this->unNumber;
    }

    /**
     * @param string $unNumber
     * @return ConsignmentDetails
     */
    public function setUnNumber(string $unNumber): ConsignmentDetails
    {
        $this->unNumber = $unNumber;
        return $this;
    }

    /**
     * @return Package
     */
    public function getPackage(): Package
    {
        return $this->package;
    }

    /**
     * @param Package $package
     * @return ConsignmentDetails
     */
    public function setPackage(Package $package): ConsignmentDetails
    {
        $this->package = $package;
        return $this;
    }

}