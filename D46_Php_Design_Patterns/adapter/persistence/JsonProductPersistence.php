<?php

namespace adapter\persistence;

use adapter\classe\Product;

class JsonProductPersistence implements ProductPersistenceInterface {
    private string $filePath;

    public function __construct(string $filePath){
        $this->filePath = $filePath;
    }

    public function save(Product $product): void {
        $productInfo = [
            'id' => $product->id,
            'designation' => $product->designation,
            'univers' => $product->univers,
            'price' => $product->price,
        ];

        $jsonInfo = json_encode($productInfo);

        file_put_contents($this->filePath, $jsonInfo);
    }
}

?>