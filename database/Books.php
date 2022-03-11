<?php
// Apraksta info par grāmatām

class BCK extends Items
{
    private $value;
    private const VALUE_TYPE = 'Weight';
    private const VALUE_MEASURE = 'kg';

    public function __construct(array $arr)
    {;
        parent::__construct($arr);
        $this->value = $arr['Weight'];
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
        $sqlOrders = "INSERT INTO inventory (SKU, Name, Price, Type, Weight) VALUES ";
        $sqlValues = parent::sqlSend();
        $sqlValues .= '"BCK",' . $this->value . ');';

        return ($sqlOrders . $sqlValues);
    }
}
