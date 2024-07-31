<?php

namespace App\Service;

use PDO;
use PDOException;

class DatabaseService {
    private $connection;

    public function __construct(string $dsn, string $user, string $password)
    {
        try {
            $this->connection = new PDO($dsn, $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new \Exception('Connection failed: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function sqlQuery(string $sqlQuery)
    {
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}

?>