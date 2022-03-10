<?php
// Datubāzes pārvaldības un datu apmaiņas nodrošināšanas fails
include './Products.php';

class database {
    // Datubāzes pieslēgšanās atribūti
    private const HOST = "***REDACTED***";
    private const USER = "***REDACTED***";
    private const PASS = "***REDACTED***";
    private const DB_ID = "***REDACTED***";
    // Datubāzes savienojuma mainīgais
    protected $connection;

    // Veidojam savienojumu ar datubāzi
    function __construct()
    {
        $this->connection = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB_ID);
    }
    function __destruct()
    {
        if ($this->connection)
        {
            $this->connection -> close();
        }
    }

    function getProductList()
    {
        $arr = array();

        // Pārbaudām, vai eksistē savienojums ar datubāzi
        if (!$this->connection)
        {
            http_response_code(500);
            return $arr;
        }

        // Tā kā savienojums eksistē, savācam mums nepieciešamo informāciju
        $sqlRequest = "SELECT * FROM inventory;";
        $sqlQuery = mysqli_query($this->connection, $sqlRequest);
        $sqlReply = mysqli_fetch_all($sqlQuery, MYSQLI_ASSOC);

        // Derētu pārveidot sql tabulu par PHP masīvu (array)
        foreach ($sqlReply as $row)
        {
            $item = new $row["Type"]($row);
            array_push($arr, $item);
        }

        // Atgriežam aizpildīto & noformēto masīvu
        return $arr;
    }

}