<?php

namespace App\Interface;

interface PersistenceInterface
{
    public function saveSingle(string $tableName, EntityInterface $entity): int|bool;
}