<?php
define("ROOT", __DIR__ . '/');

//lietu klases
class item {
    protected $sku;
    protected $name;
    protected $price;
}
class book extends item {
    public $attributeType = "Weight";
    protected $weight;
    public $attributeMeasure = "kg";
}
class dvd extends item {
    public $attributeType = "Size";
    protected $size;
    public $attributeMeasure = "GB";
}
class furniture extends item {
    public $attributeType = "Dimensions";
    protected $height;
    protected $width;
    protected $length;
    public $attributeMeasure = "";
};
?>