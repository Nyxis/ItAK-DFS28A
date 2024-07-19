<?php

namespace App\Entity;

use App\Interface\EntityInterface;

class Product implements EntityInterface
{
    const TABLE_NAME = 'products';

    private ?int $id = null;
    public string $designation;
    public string $univers;
    public int $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function fromArray(array $entity): self
    {
        foreach ($entity as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }

        return $this;
    }
}