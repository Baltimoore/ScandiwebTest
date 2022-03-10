<?php
// Apraksta info par mēbelēm

class FRN extends Items
{
    private $height;
    private $width;
    private $length;
    private const VALUE_TYPE = 'Dimensions';
    private const VALUE_MEASURE = 'cm';

    function __construct(array $arr)
    {
        parent::__construct($arr);
        $this->height = $arr('fHeight');
        $this->width = $arr('fWidth');
        $this->length = $arr('fLength');
    }

    function getValue()
    {
        return ($this->height . $this->width . $this->length);
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

    function sqlSend()
    {
        $sqlOrders = "INSERT INTO inventory (SKU, Name, Price, Type, fHeight, fWidth, fLength) VALUES ";
        $sqlValues = parent::sqlSend();
        $sqlValues .= '"FRN",' . $this->height . ',' . $this->width . ',' . $this->length . ');';

        return ($sqlOrders . $sqlValues);
    }
}