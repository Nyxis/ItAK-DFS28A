<?php
require_once 'Product.php';
require_once 'ProductRepository.php';
require_once 'SqlProductPersister.php';
require_once 'JsonFileProductPersister.php';
require_once 'Database.php';

// Database connection details
$host = 'localhost';
$dbname = 'product_db';
$username = 'root'; // default XAMPP username
$password = ''; // default XAMPP password (empty)

try {
    $connection = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $database = new Database();
    $sqlPersister = new SqlProductPersister($database, $connection);
    $sqlRepository = new ProductRepository($sqlPersister);

    $jsonPersister = new JsonFileProductPersister(__DIR__ . '/products.json');
    $jsonRepository = new ProductRepository($jsonPersister);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product = new Product();
        $product->designation = $_POST['designation'];
        $product->univers = $_POST['univers'];
        $product->price = (int)$_POST['price'];

        $sqlRepository->save($product); // Saves to SQL database
        echo "Product added successfully to SQL database with ID: " . $product->id . "<br>";

        $jsonRepository->save($product); // Saves to JSON file
        echo "Product added successfully to JSON file.<br>";

        // debug information
        echo "JSON file location: " . __DIR__ . '/products.json' . "<br>";

        echo "<a href='add_product.php'>Add another product</a>";
    }
} catch (PDOException $e) {
    echo "Database operation failed: " . $e->getMessage();
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
