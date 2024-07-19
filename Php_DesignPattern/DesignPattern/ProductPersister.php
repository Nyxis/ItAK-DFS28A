<?php
interface ProductPersister
{
    public function save(Product $product): void;
}
