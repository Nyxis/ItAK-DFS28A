<?php

namespace adapter\repository;

use adapter\classe\Product;
use adapter\interface\ProductPersistenceInterface;

class ProductRepository {
    private ProductPersistenceInterface $persistence;

   public function __construct(ProductPersistenceInterface $persistence) {
    $this->persistence = $persistence;
   }

   public function save(Product $product) {
    $this->persistence->save($product);
   }
}

?>