<?php
// Apraksta info par grāmatām

class Books extends Items
{
    private $value;
    private const VALUE_TYPE = 'Weight';
    private const VALUE_MEASURE = 'kg';

    function __construct(array $arr)
    {
        parent::__construct($arr);
        $this->value = $arr('Weight');
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
