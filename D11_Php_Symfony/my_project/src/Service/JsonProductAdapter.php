<?php

namespace App\Service;

class JsonProductAdapter implements ProductPersistenceInterface {
    public function save(array $product) : bool {
        return true;
    }
}

?>