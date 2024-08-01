<?php

namespace TP\DesignPattern\Interface;

use TP\DesignPattern\Class\Product;

interface PersistenceInterface
{
    public function saveProduct(Product $product): void;
}