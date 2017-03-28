<?php

namespace RWypior\TNTCourier\Model;

class DatasetRequestType
{
    const DATASET_TYPE_SERVICES = 'service';
    const DATASET_TYPE_OPTIONS = 'option';

    protected $dataset;

    public function __construct($type)
    {
        $this->dataset = $type;
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('DATASET', $this->dataset);
    }

    /**
     * @return mixed
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    /**
     * @param mixed $dataset
     * @return DatasetRequestType
     */
    public function setDataset($dataset)
    {
        $this->dataset = $dataset;
        return $this;
    }

}