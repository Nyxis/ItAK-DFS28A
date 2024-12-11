<?php

namespace App\Service;

class FileProductPersistence
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function saveProduct(string $productName): bool
    {
        try {
            $file = fopen($this->filePath, 'a');
            fwrite($file, $productName . PHP_EOL);
            fclose($file);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}

?>