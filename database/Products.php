<?php
// Lielā inventāra klases aprakstītājs
include './Books.php';
include './DVDs.php';
include './Furniture.php';

abstract class Items
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    function __construct(array $arr)
    {
        $this->sku = $arr['SKU'];
        $this->name = $arr['Name'];
        $this->price = $arr['Price'];
        $this->type = $arr['Type'];
    }

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