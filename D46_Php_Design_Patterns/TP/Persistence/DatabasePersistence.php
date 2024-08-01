<?php

namespace TP\DesignPattern\Persistence;

use TP\DesignPattern\Adapter\Database;
use TP\DesignPattern\Class\Product;
use TP\DesignPattern\Interface\PersistenceInterface;

class DatabasePersistence implements PersistenceInterface
{
    private Database $database;
    private \PDO $connexion;

    public function __construct(Database $database, \PDO $connexion)
    {
        $this->database = $database;
        $this->connexion = $connexion;
    }

    public function saveProduct(Product $product): void
    {
        $sqlQuery = sprintf(
            "INSERT INTO products (id, designation, univers, price) VALUES (%d, '%s', '%s', %d)",
            $product->getId(), $product->designation, $product->univers, $product->price
        );
        $this->database->sqlQuery($sqlQuery, $this->connexion);
    }
}