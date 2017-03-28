<?php

namespace RWypior\TNTCourier\Model;

class Sender extends Person
{
    protected $account = '';
    protected $collection;

    public function __construct($account, $name, $street, $city, $province, $postal, $vat, $phoneDial, $phone, $email = NULL, $contactName = NULL, Collection $collection = NULL)
    {
        parent::__construct($name, $street, $city, $province, $postal, $vat, $phoneDial, $phone, $email, $contactName);

        if ($collection == NULL)
            $collection = new Collection();

        $this->account = $account;
        $this->collection = $collection;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('COMPANYNAME', $this->companyName);
        $parent->addChild('STREETADDRESS1', $this->streetAddress1);
        $parent->addChild('STREETADDRESS2', $this->streetAddress2);
        $parent->addChild('STREETADDRESS3', $this->streetAddress3);
        $parent->addChild('CITY', $this->city);
        $parent->addChild('PROVINCE', $this->province);
        $parent->addChild('POSTCODE', $this->postCode);
        $parent->addChild('COUNTRY', $this->country);
        $parent->addChild('ACCOUNT', $this->account);
        $parent->addChild('VAT', $this->vat);
        $parent->addChild('CONTACTNAME', $this->contactName);
        $parent->addChild('CONTACTDIALCODE', $this->contactDialCode);
        $parent->addChild('CONTACTTELEPHONE', $this->contactTelephone);
        $parent->addChild('CONTACTEMAIL', $this->contactEmail);
        $collection = $parent->addChild('COLLECTION');

        $this->collection->toXml($collection);
    }

    /**
     * @return string
     */
    public function getAccount(): string
    {
        return $this->account;
    }

    /**
     * @param string $account
     * @return Sender
     */
    public function setAccount(string $account): Sender
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getCollection(): Collection
    {
        return $this->collection;
    }

    /**
     * @param Collection $collection
     * @return Sender
     */
    public function setCollection(Collection $collection): Sender
    {
        $this->collection = $collection;
        return $this;
    }

}