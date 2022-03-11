<?php
// Apraksta info par diskiem

class DVD extends Items
{
    private $value;
    private const VALUE_TYPE = 'Size';
    private const VALUE_MEASURE = 'GB';

    public function __construct(array $arr)
    {
        parent::__construct($arr);
        $this->value = $arr['Size'];
    }

    public function getValue()
    {
        return $this->value;
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
        $sqlOrders = "INSERT INTO inventory (SKU, Name, Price, Type, Size) VALUES ";
        $sqlValues = parent::sqlSend();
        $sqlValues .= '"DVD",' . $this->value . ');';

        return ($sqlOrders . $sqlValues);
    }
}
