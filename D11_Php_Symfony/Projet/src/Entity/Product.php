<?php

namespace App\Entity;

use App\Interface\EntityInterface;

class Product implements EntityInterface
{
    const TABLE_NAME = 'products';

    private ?int $id = null;
    private ?string $designation = null;
    private ?string $univers = null;
    private ?int $price = null;

    /**
     * Get the value of id
     */ 
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of designation
     */ 
    public function getDesignation(): string
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     *
     * @return  self
     */ 
    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get the value of univers
     */ 
    public function getUnivers(): string
    {
        return $this->univers;
    }

    /**
     * Set the value of univers
     *
     * @return  self
     */ 
    public function setUnivers(string $univers): self
    {
        $this->univers = $univers;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}