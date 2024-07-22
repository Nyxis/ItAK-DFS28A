<?php

require_once 'Product.php';
require_once 'Database.php';
require_once 'ProductRepository.php';
require_once 'ProductPersistenceInterface.php';
require_once 'DatabaseProductPersistence.php';
require_once 'JsonProductPersistence.php';

use adapter\classe\Product;
use adapter\repository\ProductRepository;
use adapter\service\Database;
use adapter\persistence\DatabaseProductPersistence;
use adapter\persistence\JsonProductPersistence;

$product = new Product(
    id: 1,
    designation: 'Exemple Product',
    univers: 'Univers 1',
    price: 120
);

$database = new Database('mysql:host=localhost;dbname=dbtest','root','password');
$productRepository = new ProductRepository(new DatabaseProductPersistence($database));
$productRepository->save($product);

$productRepository = new ProductRepository(new JsonProductPersistence(__DIR__ . '/../data/product.json'));
$productRepository->save($product);

?>