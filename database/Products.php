<?php
// Lielā inventāra klases aprakstītājs
include 'database/Books.php';
include 'database/DVDs.php';
include 'database/Furniture.php';

abstract class Items
{
    protected $sku;
    protected $name;
    protected $price;
    protected $type;

    protected function __construct(array $arr)
    {
        $this->sku = $arr['SKU'];
        $this->name = $arr['Name'];
        $this->price = $arr['Price'];
        $this->type = $arr['Type'];
    }

    protected function setSKU($new)
    {
        $this->sku = $new;
    }
    protected function setName($new)
    {
        $this->name = $new;
    }
    protected function setPrice($new)
    {
        $this->price = $new;
    }
    protected function setType($new)
    {
        $this->type = $new;
    }

    public function getSKU()
    {
        return $this->sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getType()
    {
        return $this->type;
    }

    protected function sqlSend()
    {
        $sqlContents = '("' . $this->sku . '",';
        $sqlContents .= '"' . $this->name . '",';
        $sqlContents .= $this->price . ',';
        return $sqlContents;
    }
}
