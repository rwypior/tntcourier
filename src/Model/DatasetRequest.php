<?php

namespace RWypior\TNTCourier\Model;

class DatasetRequest
{
    protected $login;
    protected $request;

    public function __construct(Login $login, DatasetRequestType $type)
    {
        $this->login = $login;
        $this->request = $type;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $login = $parent->addChild('LOGIN');
        $request = $parent->addChild('REQUEST');

        $this->login->toXml($login);
        $this->request->toXml($request);
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
     * @return DatasetRequest
     */
    public function setLogin(Login $login): DatasetRequest
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return DatasetRequestType
     */
    public function getRequest(): DatasetRequestType
    {
        return $this->request;
    }

    /**
     * @param DatasetRequestType $request
     * @return DatasetRequest
     */
    public function setRequest(DatasetRequestType $request): DatasetRequest
    {
        $this->request = $request;
        return $this;
    }

}