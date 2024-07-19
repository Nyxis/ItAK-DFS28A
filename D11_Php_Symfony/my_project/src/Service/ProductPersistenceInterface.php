<?php 

namespace App\Service;

interface ProductPersistenceInterface {

    public function save(array $product): bool;
}

?>