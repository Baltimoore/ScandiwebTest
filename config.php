<?php // Fails domāts lai pieslēgtos datubāzei, un iespējotu datu apmaiņu ar to

// Datubāzes pieslēgšanās informācija
$hostName = "***REMOVED***";
$username = "***REMOVED***";
$password = "***REMOVED***";
$database = "***REMOVED***";

// Savienojuma izveide
$connection = new mysqli($hostName, $username, $password, $database);

// Savienojuma pārbaude
if ($connection->connect_error) {
    http_response_code(500);
    require __DIR__ . '/views/500.php';
}

// Inventāra klases
class item
{
    protected $sku;
    protected $name;
    protected $price;
}
class book extends item
{
    public $attributeType = "Weight";
    protected $weight;
    public $attributeMeasure = "kg";
}
class dvd extends item
{
    public $attributeType = "Size";
    protected $size;
    public $attributeMeasure = "GB";
}
class furniture extends item
{
    public $attributeType = "Dimensions";
    protected $height;
    protected $width;
    protected $length;
    public $attributeMeasure = "CM";
};