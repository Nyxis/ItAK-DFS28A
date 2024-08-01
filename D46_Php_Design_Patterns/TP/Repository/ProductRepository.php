<?php

namespace TP\DesignPattern\Repository;

use TP\DesignPattern\Class\Product;
use TP\DesignPattern\Interface\PersistenceInterface;

class ProductRepository
{
    private PersistenceInterface $persistence;

    public function __construct(PersistenceInterface $persistence)
    {
        $this->persistence = $persistence;
    }

    public function save(Product $product): void
    {
        $this->persistence->saveProduct($product);
    }
}