<?php

namespace RWypior\TNTCourier\Model;

class Article
{
    protected $items = 1;
    protected $description = '';
    protected $weight = 0.5;
    protected $invoiceValue = 249.90;
    protected $invoiceDesc = '';
    protected $HTS = '';
    protected $country = 'RO';

    public function __construct($weight, $value, $description = '')
    {
        $this->description = $this->invoiceDesc = $description;
        $this->weight = $weight;
        $this->value = $value;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('ITEMS', $this->items);
        $parent->addChild('DESCRIPTION', $this->description);
        $parent->addChild('WEIGHT', $this->weight);
        $parent->addChild('INVOICEVALUE', $this->invoiceValue);
        $parent->addChild('INVOICEDESC', $this->invoiceDesc);
        $parent->addChild('HTS', $this->HTS);
        $parent->addChild('COUNTRY', $this->country);
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
     * @return Article
     */
    public function setItems(int $items): Article
    {
        $this->items = $items;
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
     * @return Article
     */
    public function setDescription(string $description): Article
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return Article
     */
    public function setWeight(float $weight): Article
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return float
     */
    public function getInvoiceValue(): float
    {
        return $this->invoiceValue;
    }

    /**
     * @param float $invoiceValue
     * @return Article
     */
    public function setInvoiceValue(float $invoiceValue): Article
    {
        $this->invoiceValue = $invoiceValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceDesc(): string
    {
        return $this->invoiceDesc;
    }

    /**
     * @param string $invoiceDesc
     * @return Article
     */
    public function setInvoiceDesc(string $invoiceDesc): Article
    {
        $this->invoiceDesc = $invoiceDesc;
        return $this;
    }

    /**
     * @return string
     */
    public function getHTS(): string
    {
        return $this->HTS;
    }

    /**
     * @param string $HTS
     * @return Article
     */
    public function setHTS(string $HTS): Article
    {
        $this->HTS = $HTS;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Article
     */
    public function setCountry(string $country): Article
    {
        $this->country = $country;
        return $this;
    }

}