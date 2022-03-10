<?php
// Apraksta info par mēbelēm

class Furniture extends Items
{
    private $value;
    private const VALUE_TYPE = 'Dimensions';
    private const VALUE_MEASURE = 'cm';

    function __construct(array $arr)
    {
        parent::__construct($arr);
        $this->value = $arr('fHeight') . 'x' . $arr('fWidth') . 'x' . $arr('fLength');
    }

    function getValue ()
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