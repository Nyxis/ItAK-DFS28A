<?php
class SqlProductPersister implements ProductPersister
{
    private Database $database;
    private \PDO $connection;

    public function __construct(Database $database, \PDO $connection)
    {
        $this->database = $database;
        $this->connection = $connection;
    }

    public function save(Product $product): void
    {
        if ($product->id === null) {
            // Insert new product
            $sql = "INSERT INTO products (designation, univers, price) 
                    VALUES (:designation, :univers, :price)";
            $params = [
                ':designation' => $product->designation,
                ':univers' => $product->univers,
                ':price' => $product->price
            ];
        } else {
            // Update existing product
            $sql = "UPDATE products SET designation = :designation, univers = :univers, price = :price 
                    WHERE id = :id";
            $params = [
                ':id' => $product->id,
                ':designation' => $product->designation,
                ':univers' => $product->univers,
                ':price' => $product->price
            ];
        }

        $this->database->sqlQuery($sql, $this->connection, $params);

        if ($product->id === null) {
            $product->id = $this->connection->lastInsertId();
        }
    }
}
