<?php

namespace App\Entity;

class Product {
    const TABLE_NAME = 'oskour';

    private ?int $id = null;
    public string $designation;
    public string $univers;
    public int $price;

    public function getId(): ?int
    {
        return $this->id;
    }



}

?>