<?php
class JsonFileProductPersister implements ProductPersister
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($this->filePath)) {
            file_put_contents($this->filePath, json_encode([]));
        }
    }

    public function save(Product $product): void
    {
        $data = [
            'id' => $product->id,
            'designation' => $product->designation,
            'univers' => $product->univers,
            'price' => $product->price
        ];

        $existingData = json_decode(file_get_contents($this->filePath), true) ?? [];
        $existingData[] = $data;

        file_put_contents($this->filePath, json_encode($existingData, JSON_PRETTY_PRINT));
    }
}
