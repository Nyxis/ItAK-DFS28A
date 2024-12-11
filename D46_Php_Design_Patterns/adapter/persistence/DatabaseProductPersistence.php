<?php

namespace adapter\persistence;

use adapter\classe\Product;
use adapter\service\Database;

class DatabaseProductPersistence implements ProductPersistenceInterface {
    private Databse $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    public function save(Product $product): void {
        $sqlQuery = "INSERT INTO products (id, designation, univers, price) VALUES (
            {$product->id},
            '{$product->designation}',
            '{$product->univers}',
            {$product->price)    
        )";
    }
}

?>