<?php

namespace App\Service;

class ProductService {
    private $persistence;

    public function __constrct(ProductPersistenceInterface $persistence) {
        $this->persistence = $persistence;
    }

    public function saveProduct(array $product): bool{
        return $this->persistence->save($product);
    }
}

?>