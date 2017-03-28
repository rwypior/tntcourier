<?php

namespace RWypior\TNTCourier\Model;

class Person
{
    protected $companyName = '';
    protected $streetAddress1 = '';
    protected $streetAddress2 = '';
    protected $streetAddress3 = '';
    protected $city = '';
    protected $country = 'RO';
    protected $vat = '';
    protected $contactName = '';
    protected $contactDialCode = '';
    protected $contactTelephone = '';
    protected $contactEmail = '';

    public function __construct($name, $street, $city, $province, $postal, $vat, $phoneDial, $phone, $email = NULL, $contactName = NULL)
    {
        $this->companyName = $name;
        $this->streetAddress1 = $street;
        $this->city = $city;
        $this->province = $province;
        $this->postCode = $postal;
        $this->vat = $vat;
        $this->contactDialCode = $phoneDial;
        $this->contactTelephone = $phone;
        $this->contactEmail = $email;
        $this->contactName = $contactName ?: $name;
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
        $parent->addChild('VAT', $this->vat);
        $parent->addChild('CONTACTNAME', $this->contactName);
        $parent->addChild('CONTACTDIALCODE', $this->contactDialCode);
        $parent->addChild('CONTACTTELEPHONE', $this->contactTelephone);
        $parent->addChild('CONTACTEMAIL', $this->contactEmail);
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return Person
     */
    public function setCompanyName(string $companyName): Person
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAddress1(): string
    {
        return $this->streetAddress1;
    }

    /**
     * @param string $streetAddress1
     * @return Person
     */
    public function setStreetAddress1(string $streetAddress1): Person
    {
        $this->streetAddress1 = $streetAddress1;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAddress2(): string
    {
        return $this->streetAddress2;
    }

    /**
     * @param string $streetAddress2
     * @return Person
     */
    public function setStreetAddress2(string $streetAddress2): Person
    {
        $this->streetAddress2 = $streetAddress2;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAddress3(): string
    {
        return $this->streetAddress3;
    }

    /**
     * @param string $streetAddress3
     * @return Person
     */
    public function setStreetAddress3(string $streetAddress3): Person
    {
        $this->streetAddress3 = $streetAddress3;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Person
     */
    public function setCity(string $city): Person
    {
        $this->city = $city;
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
     * @return Person
     */
    public function setCountry(string $country): Person
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getVat(): string
    {
        return $this->vat;
    }

    /**
     * @param string $vat
     * @return Person
     */
    public function setVat(string $vat): Person
    {
        $this->vat = $vat;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactName(): string
    {
        return $this->contactName;
    }

    /**
     * @param string $contactName
     * @return Person
     */
    public function setContactName(string $contactName): Person
    {
        $this->contactName = $contactName;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactDialCode(): string
    {
        return $this->contactDialCode;
    }

    /**
     * @param string $contactDialCode
     * @return Person
     */
    public function setContactDialCode(string $contactDialCode): Person
    {
        $this->contactDialCode = $contactDialCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactTelephone(): string
    {
        return $this->contactTelephone;
    }

    /**
     * @param string $contactTelephone
     * @return Person
     */
    public function setContactTelephone(string $contactTelephone): Person
    {
        $this->contactTelephone = $contactTelephone;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param null|string $contactEmail
     * @return Person
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
        return $this;
    }

}