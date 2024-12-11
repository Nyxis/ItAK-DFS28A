<?php

namespace adapter\persistence;

use adapter\classe\Product;

interface ProductPersistenceInterface {
    public function save(Product $product): void;
}

?>