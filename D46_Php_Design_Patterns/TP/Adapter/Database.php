<?php

namespace TP\DesignPattern\Adapter;

use PDO;

class Database
{
    public function sqlQuery(string $sqlQuery, PDO $connexion)
    {
        $stmt = $connexion->prepare($sqlQuery);
        $stmt->execute();
    }
}