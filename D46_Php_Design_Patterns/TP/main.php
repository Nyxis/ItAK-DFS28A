<?php

namespace TP\DesignPattern;

require __DIR__ . '/Autoloader.php';
$configPath = __DIR__ . '/config.local.php';
if (!file_exists($configPath)) {
    die('Local config file missing : ' . $configPath);
}
require $configPath;
spl_autoload_register(new Autoloader(Autoloader::class));

use TP\DesignPattern\Adapter\Database;
use TP\DesignPattern\Class\Product;
use TP\DesignPattern\Persistence\DatabasePersistence;
use TP\DesignPattern\Persistence\FilePersistence;
use TP\DesignPattern\Repository\ProductRepository;

use PDO;

$product = new Product();
$product->designation = "Example Product";
$product->univers = "Electronics";
$product->price = 999;

$dsn = sprintf(
    'mysql:host=%s;dbname=%s',
    DATABASE_HOST,
    DATABASE_NAME
);

$database = new Database();
$connexion = new PDO($dsn, DATABASE_USER, DATABASE_PASSWORD);
$databasePersistence = new DatabasePersistence($database, $connexion);

$productRepository = new ProductRepository($databasePersistence);
$productRepository->save($product);

$pathProducts = __DIR__ . '/products.json';

$filePersistence = new FilePersistence($pathProducts);

$productRepository = new ProductRepository($filePersistence);
$productRepository->save($product);