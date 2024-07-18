<?php

namespace App\Adapter;

use PDO;

class Database
{
    private PDO $connexion;

    public function __construct(
        string $dsn,
        string $user,
        string $password,
    ) {
        $this->connexion = new PDO($dsn, $user, $password);
    }

    public function sqlQuery(string $sqlQuery)
    {
        $stmt = $this->connexion->prepare($sqlQuery);
        return $stmt->execute();
    }
}