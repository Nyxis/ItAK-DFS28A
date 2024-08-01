<?php

namespace TP\DesignPattern\Class;

class Product
{
    private ?int $id = null;
    public string $designation;
    public string $univers;
    public int $price;

    public function getId(): ?int
    {
        return $this->id;
    }
}