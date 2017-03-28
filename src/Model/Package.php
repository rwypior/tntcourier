<?php

namespace RWypior\TNTCourier\Model;

class Package
{
    protected $items = 0;
    protected $description = 'CERTIFICAT FIRMA DE INCREDERE';
    protected $length = 0.30;
    protected $height = 0.05;
    protected $width = 0.21;
    protected $weight = 0.5;
    protected $articles = [];

    public function toXml(\SimpleXMLElement $parent)
    {
        $parent->addChild('ITEMS', $this->items);
        $parent->addChild('DESCRIPTION', $this->description);
        $parent->addChild('LENGTH', $this->length);
        $parent->addChild('HEIGHT', $this->height);
        $parent->addChild('WIDTH', $this->width);
        $parent->addChild('WEIGHT', $this->weight);

        foreach($this->articles as $article)
        {
            $newarticle = $parent->addChild('ARTICLE');
            $article->toXml($newarticle);
        }
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
     * @return Package
     */
    public function setItems(int $items): Package
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
     * @return Package
     */
    public function setDescription(string $description): Package
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @return Package
     */
    public function setLength(float $length): Package
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @return Package
     */
    public function setHeight(float $height): Package
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @return Package
     */
    public function setWidth(float $width): Package
    {
        $this->width = $width;
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
     * @return Package
     */
    public function setWeight(float $weight): Package
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return array
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param array $articles
     * @return Package
     */
    public function setArticles(array $articles): Package
    {
        $this->articles = $articles;
        $this->items = count($articles);
        return $this;
    }

    /**
     * @param Article $article
     * @return Package
     */
    public function addArticle(Article $article): Package
    {
        $this->articles[] = $article;
        ++$this->items;
        return $this;
    }

}