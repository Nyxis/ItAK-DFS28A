<?php
require_once 'ProductPersister.php';
require_once 'Product.php';

class ProductRepository
{
    private ProductPersister $persister;

    public function __construct(ProductPersister $persister)
    {
        $this->persister = $persister;
    }

    public function save(Product $product): void
    {
        $this->persister->save($product);
    }
}
