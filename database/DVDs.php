<?php
// Apraksta info par mēbelēm

class Furniture extends Items
{
    private $value;
    private const VALUE_TYPE = 'Size';
    private const VALUE_MEASURE = 'GB';

    function __construct(array $arr)
    {
        parent::__construct($arr);
        $this->value = $arr('Size');
    }

    function getValue()
    {
        return $this->value;
    }
    function getValueType()
    {
        return self::VALUE_TYPE;
    }
    function getValueMeasure()
    {
        return self::VALUE_MEASURE;
    }

    function setValue($input)
    {
        $this->value = $input;
    }
}
