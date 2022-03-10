<?php
// Datubāzes pārvaldības fails
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
}