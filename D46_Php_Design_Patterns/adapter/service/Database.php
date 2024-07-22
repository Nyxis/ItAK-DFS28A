<?php

namespace adapter\service;

class Database implements PersistenceInterface{
    private \PDO $connexion;

    public function __construct(\PDO $connexion){
        $this->connexion = $connexion
    }

    public function save(Product $product){
        $sqlQuery = "INSERT INTO product (id, designation, univers, price) VALUES (
            {$product->id},
            '{$product->designation}',
            '{$product->univers}',
            {$product->price}
            )";

        $smtm = $this->connexion->prepare($sqlQuery);
        $smtm->execute();
    }
}

?>