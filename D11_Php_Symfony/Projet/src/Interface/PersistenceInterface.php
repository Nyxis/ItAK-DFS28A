<?php

namespace App\Interface;

interface PersistenceInterface
{
    public function saveSingle(string $tableName, EntityInterface $entity): int|bool;
    
    public function updateSingle(string $tableName, EntityInterface $entity): int|bool;

    public function delete(string $tableName, string $class, int $id): bool;

    public function getById(string $tableName, string $class, int $id): EntityInterface|null;
    public function getAll(string $tableName, string $class): array;
}