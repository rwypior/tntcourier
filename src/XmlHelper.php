<?php

namespace RWypior\TNTCourier;

class XmlHelper
{
    /**
     * Obtain xml-stylesheet element from given DOMDocument
     * @param \DOMDocument $xmlDocument
     * @return \DOMNode|boolean found node or false on failure
     */
    public static function getStylesheetElement(\DOMDocument $xmlDocument)
    {
        $style = (new \DOMXPath($xmlDocument))->evaluate('//processing-instruction()[name()="xml-stylesheet"]');
        return $style->item(0);
    }

    /**
     * Replace href attribute of stylesheet to given value
     * @param string $doc xml document contents
     * @param string $value new stylesheet file path
     * @return string altered stylesheet content
     */
    public static function replaceStylesheet(string $doc, string $value)
    {
        $dom = new \DOMDocument();
        $dom->loadXML($doc);

        $stylenode = self::get_stylesheet_element($dom);
        $stylenode->data = sprintf('href="%s" type="text/xsl"', $value);

        return $dom->saveXML();
    }

    /**
     * @param string $root default root node
     * @return \SimpleXMLElement
     */
    public static function createBaseXml($root)
    {
        return new \SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?><!DOCTYPE ESHIPPER SYSTEM 'http://10.210.132.162:81/ShipperDTD2.0/eshipperin2.dtd'><$root></$root>");
    }

    /**
     * URLEncode every text node of given document
     * @param \SimpleXMLElement $xml
     * @return \SimpleXMLElement
     */
    public static function encodeDocument(\SimpleXMLElement $xml)
    {
        $newxml = new \SimpleXMLElement($xml->saveXML());
        self::encodeDocumentElement($newxml);
        return $newxml;
    }

    /**
     * URLEncode every text node of given element and it's children
     * @param \SimpleXMLElement $element
     */
    public static function encodeDocumentElement(\SimpleXMLElement $element)
    {
        if ($element->children())
        {
            foreach($element->children() as $child)
            {
                self::encodeDocumentElement($child);
            }
        }
        else
        {
            $val = $element[0];
            $val = str_replace('&', '&amp;', $val);
            $val = urlencode($val);
            $element[0] = $val;
        }
    }
}