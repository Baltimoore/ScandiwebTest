<?php
// Datubāzes pārvaldības un datu apmaiņas nodrošināšanas fails
include 'database/Products.php';

class database
{
    // Datubāzes pieslēgšanās atribūti
    private const HOST = "***REMOVED***";
    private const USER = "***REMOVED***";
    private const PASS = "***REMOVED***";
    private const DB_ID = "***REMOVED***";
    // Datubāzes savienojuma mainīgais
    private $connection;

    // Veidojam savienojumu ar datubāzi
    function __construct()
    {
        $this->connection = mysqli_connect(self::HOST, self::USER, self::PASS, self::DB_ID);
    }
    function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    function sendCommands(string $sqlRequest, bool $requireReply)
    {
        // Pārbaudām, vai eksistē savienojums
        if (!($this->connection)) {
            http_response_code(500);
            if ($requireReply) return NULL;
            else return;
        }

        // Tā kā savienojums eksistē, savācam mums nepieciešamo informāciju
        $sqlReply = $this->connection->query($sqlRequest);
        if ($requireReply) return $sqlReply;
        else return;
    }
}
