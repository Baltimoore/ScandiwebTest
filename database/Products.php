<?php
// Lielā inventāra klases aprakstītājs
class item
{
    protected $sku;
    protected $name;
    protected $price;
    protected $value;
    protected $type;

    function setSKU($new)
    {
        $this->sku = $new;
    }
    function setName($new)
    {
        $this->name = $new;
    }
    function setPrice($new)
    {
        $this->price = $new;
    }
    function setValue($new)
    {
        $this->value = $new;
    }
    function setType($new)
    {
        $this->type = $new;
    }

    function readSKU()
    {
        return $this->sku;
    }
    function readName()
    {
        return $this->name;
    }
    function readPrice()
    {
        return $this->price;
    }
    function readValue()
    {
        return $this->value;
    }
    function readType()
    {
        return $this->type;
    }
}