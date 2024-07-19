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
    echo "Connected successfully to the database.<br>";

    $database = new Database();
    $sqlPersister = new SqlProductPersister($database, $connection);
    $sqlRepository = new ProductRepository($sqlPersister);

    $jsonPersister = new JsonFileProductPersister(__DIR__ . '/products.json');
    $jsonRepository = new ProductRepository($jsonPersister);

    $product1 = new Product();
    $product1->id = 1;
    $product1->designation = "4K Smart TV";
    $product1->univers = "Electronics";
    $product1->price = 799;

    $product2 = new Product();
    $product2->id = 2;
    $product2->designation = "Leather Sofa";
    $product2->univers = "Furniture";
    $product2->price = 1299;

    $product3 = new Product();
    $product3->id = 3;
    $product3->designation = "Running Shoes";
    $product3->univers = "Sports";
    $product3->price = 129;

    $product4 = new Product();
    $product4->id = 4;
    $product4->designation = "Smartphone";
    $product4->univers = "Electronics";
    $product4->price = 699;

    $product5 = new Product();
    $product5->id = 5;
    $product5->designation = "Stainless Steel Cookware Set";
    $product5->univers = "Kitchen";
    $product5->price = 249;

    $product6 = new Product();
    $product6->id = 6;
    $product6->designation = "Gaming Laptop";
    $product6->univers = "Electronics";
    $product6->price = 1499;

    $product7 = new Product();
    $product7->id = 7;
    $product7->designation = "Organic Cotton T-Shirt";
    $product7->univers = "Clothing";
    $product7->price = 29;

    $product8 = new Product();
    $product8->id = 8;
    $product8->designation = "Electric Guitar";
    $product8->univers = "Musical Instruments";
    $product8->price = 599;

    $product9 = new Product();
    $product9->id = 9;
    $product9->designation = "Yoga Mat";
    $product9->univers = "Sports";
    $product9->price = 39;

    $product10 = new Product();
    $product10->id = 10;
    $product10->designation = "Robot Vacuum Cleaner";
    $product10->univers = "Home Appliances";
    $product10->price = 349;

    $sqlRepository->save($product1);
    echo "Product 1 saved to SQL database.<br>";
    $jsonRepository->save($product1);
    echo "Product 1 saved to JSON file.<br>";

    $sqlRepository->save($product2);
    echo "Product 2 saved to SQL database.<br>";
    $jsonRepository->save($product2);
    echo "Product 2 saved to JSON file.<br>";

    $sqlRepository->save($product3);
    echo "Product 3 saved to SQL database.<br>";
    $jsonRepository->save($product3);
    echo "Product 3 saved to JSON file.<br>";

    $sqlRepository->save($product4);
    echo "Product 4 saved to SQL database.<br>";
    $jsonRepository->save($product4);
    echo "Product 4 saved to JSON file.<br>";

    $sqlRepository->save($product5);
    echo "Product 5 saved to SQL database.<br>";
    $jsonRepository->save($product5);
    echo "Product 5 saved to JSON file.<br>";

    $sqlRepository->save($product6);
    echo "Product 6 saved to SQL database.<br>";
    $jsonRepository->save($product6);
    echo "Product 6 saved to JSON file.<br>";

    $sqlRepository->save($product7);
    echo "Product 7 saved to SQL database.<br>";
    $jsonRepository->save($product7);
    echo "Product 7 saved to JSON file.<br>";

    $sqlRepository->save($product8);
    echo "Product 8 saved to SQL database.<br>";
    $jsonRepository->save($product8);
    echo "Product 8 saved to JSON file.<br>";

    $sqlRepository->save($product9);
    echo "Product 9 saved to SQL database.<br>";
    $jsonRepository->save($product9);
    echo "Product 9 saved to JSON file.<br>";

    $sqlRepository->save($product10);
    echo "Product 10 saved to SQL database.<br>";
    $jsonRepository->save($product10);
    echo "Product 10 saved to JSON file.<br>";
} catch (PDOException $e) {
    echo "Database operation failed: " . $e->getMessage();
}
