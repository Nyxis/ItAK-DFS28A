<?php

namespace App\Entity;

use App\Interface\EntityInterface;

class Product implements EntityInterface
{
    const TABLE_NAME = 'products';

    public ?int $id = null;
    public string $designation;
    public string $univers;
    public int $price;
}