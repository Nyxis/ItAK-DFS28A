<?php

namespace App\Repository;

use App\Entity\Product;
use App\Interface\PersistenceInterface;

class ProductRepository
{
    public function __construct(
        private PersistenceInterface $persistence
    ){
    }

    public function save(Product $product): int|bool
    {
        return $this->persistence->saveSingle(Product::TABLE_NAME, $product);
    }
}