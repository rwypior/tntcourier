<?php

namespace RWypior\TNTCourier\Model;

class PrintActivity
{
    private $connote;
    private $label;
    private $manifest;

    public function __construct(PrintConnoteActivity $connote = NULL, PrintLabelActivity $label = NULL, PrintManifestActivity $manifest = NULL)
    {
        $this->connote = $connote ?: new PrintConnoteActivity();
        $this->label = $label ?: new PrintLabelActivity();
        $this->manifest = $manifest ?: new PrintManifestActivity();
    }

    public function toXml(\SimpleXMLElement $parent)
    {
        $connote = $parent->addChild('CONNOTE');
        $label = $parent->addChild('LABEL');
        $manifest = $parent->addChild('MANIFEST');

        $this->connote->toXml($connote);
        $this->label->toXml($label);
        $this->manifest->toXml($manifest);
    }

    /**
     * @return PrintConnoteActivity
     */
    public function getConnote(): PrintConnoteActivity
    {
        return $this->connote;
    }

    /**
     * @param PrintConnoteActivity $connote
     * @return PrintActivity
     */
    public function setConnote(PrintConnoteActivity $connote): PrintActivity
    {
        $this->connote = $connote;
        return $this;
    }

    /**
     * @return PrintLabelActivity
     */
    public function getLabel(): PrintLabelActivity
    {
        return $this->label;
    }

    /**
     * @param PrintLabelActivity $label
     * @return PrintActivity
     */
    public function setLabel(PrintLabelActivity $label): PrintActivity
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return PrintManifestActivity
     */
    public function getManifest(): PrintManifestActivity
    {
        return $this->manifest;
    }

    /**
     * @param PrintManifestActivity $manifest
     * @return PrintActivity
     */
    public function setManifest(PrintManifestActivity $manifest): PrintActivity
    {
        $this->manifest = $manifest;
        return $this;
    }

}