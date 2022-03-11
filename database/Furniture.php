<?php
// Apraksta info par mēbelēm

class FRN extends Items
{
    private $height;
    private $width;
    private $length;
    private const VALUE_TYPE = 'Dimensions';
    private const VALUE_MEASURE = 'cm';

    public function __construct(array $arr)
    {
        parent::__construct($arr);
        $this->height = $arr['fHeight'];
        $this->width = $arr['fWidth'];
        $this->length = $arr['fLength'];
    }

    public function getValue()
    {
        return ($this->height . "x" . $this->width . "x" . $this->length);
    }
    public function getValueType()
    {
        return self::VALUE_TYPE;
    }
    public function getValueMeasure()
    {
        return self::VALUE_MEASURE;
    }

    public function setValue($input)
    {
        $this->value = $input;
    }

    public function sqlSend()
    {
        $sqlOrders = "INSERT INTO inventory (SKU, Name, Price, Type, fHeight, fWidth, fLength) VALUES ";
        $sqlValues = parent::sqlSend();
        $sqlValues .= '"FRN",' . $this->height . ',' . $this->width . ',' . $this->length . ');';

        return ($sqlOrders . $sqlValues);
    }
}