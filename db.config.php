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
    require __DIR__ . '/views/500.php';
    die();
}

// Inventāra klases
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

class type
{
    protected $id;
    protected $valueTitle;
    protected $valueMeasure;

    function setId($new)
    {
        $this->id = $new;
    }
    function setValueTitle($new)
    {
        $this->valueTitle = $new;
    }
    function setValueMeasure($new)
    {
        $this->valueMeasure = $new;
    }

    function readId()
    {
        return $this->id;
    }
    function readValueTitle()
    {
        return $this->valueTitle;
    }
    function readValueMeasure()
    {
        return $this->valueMeasure;
    }
}