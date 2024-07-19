<?php

namespace App\Service;

class SqlProductAdapter implements ProductPersistenceInterface {
    public function save(array $product): bool {
        return true;
    }
}

?>