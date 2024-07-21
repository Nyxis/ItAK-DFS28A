<?php

namespace TP\DesignPattern\Persistence;

use TP\DesignPattern\Interface\PersistenceInterface;
use TP\DesignPattern\Class\Product;

class FilePersistence implements PersistenceInterface
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function saveProduct(Product $product): void
    {
        if (file_exists($this->filePath)) {
            $fetchedData = json_decode(file_get_contents($this->filePath));
        }

        if (!is_array($fetchedData)) {
            $fetchedData = [];
        }

        $fetchedData[] = [
            'id' => $product->getId(),
            'designation' => $product->designation,
            'univers' => $product->univers,
            'price' => $product->price,
        ];
        $data = json_encode($fetchedData);

        file_put_contents($this->filePath, $data . PHP_EOL);
    }
}