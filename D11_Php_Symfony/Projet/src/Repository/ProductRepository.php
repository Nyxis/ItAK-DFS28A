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

    public function getById(int $id): Product|null
    {
        return $this->persistence->getById(Product::TABLE_NAME, Product::class, $id);
    }

    public function delete(int $id): bool
    {
        return $this->persistence->delete(Product::TABLE_NAME, Product::class, $id);
    }

    public function getAll(): array
    {
        return $this->persistence->getAll(Product::TABLE_NAME, Product::class);
    }
}