<?php
define("ROOT", __DIR__ . '/');

//lietu klases
class item {
    protected $sku;
    protected $name;
    protected $price;
}
class book extends item {
    protected $weight;
}
class dvd extends item {
    protected $size;
}
class furniture extends item {
    protected $height;
    protected $width;
    protected $length;
};
?>