<?php


namespace MagicDeck\Service\Manager;

use PDO;
class ManagerService
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO(
            "mysql:host=localhost;dbname=magic_deck;charset=UTF8",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public function getConnection(): PDO{
        return $this->connection;
    }
}