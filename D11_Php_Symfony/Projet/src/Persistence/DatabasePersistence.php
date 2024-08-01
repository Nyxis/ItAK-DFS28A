<?php

namespace App\Persistence;

use App\Adapter\Database;
use App\Interface\EntityInterface;
use App\Interface\PersistenceInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;

class DatabasePersistence implements PersistenceInterface
{
    public function __construct(
        private Database $database
    ) {
    }

    public function saveSingle(string $tableName, EntityInterface $entity): int|bool
    {
        $pa = new PropertyAccessor();

        $properties = get_class_vars($entity::class);
        $entityArray = [];
        foreach ($properties as $property => $value) {
            $value = $pa->getValue($entity, $property);
            
            if ($value instanceof EntityInterface) {
                $entityArray[] = $value->getId();
                continue;
            } else if (is_array($value)) {
                $entityArray[] = '"' . json_encode(
                    array_map(function($obj) {
                        if ($obj instanceof EntityInterface) {
                            return $obj->id;
                        }
                        return $obj;
                    }, $value)
                ) . '"';
                continue;
            }
            
            $entityArray[] = $value ? '"' . $value . '"': 'null';
        }

        $sqlQuery = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $tableName,
            implode(',', array_keys($properties)),
            implode(',', $entityArray)
        );

        return $this->database->sqlQuery($sqlQuery)->rowCount();
    }

    public function updateSingle(string $tableName, EntityInterface $entity): int|bool
    {
        $pa = new PropertyAccessor();

        $properties = get_class_vars($entity::class);
        $entityArray = [];
        foreach ($properties as $property => $value) {
            $value = $pa->getValue($entity, $property);
            
            if ($value instanceof EntityInterface) {
                $entityArray[] = $value->getId();
                continue;
            } else if (is_array($value)) {
                $entityArray[] = '"' . json_encode(
                    array_map(function($obj) {
                        if ($obj instanceof EntityInterface) {
                            return $obj->id;
                        }
                        return $obj;
                    }, $value)
                ) . '"';
                continue;
            }
            
            $entityArray[] = $property . ' = ' . ($value ? '"' . $value . '"': 'null');
        }

        $sqlQuery = sprintf(
            "UPDATE %s SET %s WHERE id = %d",
            $tableName,
            implode(',', $entityArray),
            $entity->getId()
        );

        return $this->database->sqlQuery($sqlQuery)->rowCount();
    }

    public function delete(string $tableName, string $class, int $id): bool
    {
        $sqlQuery = sprintf(
            "DELETE FROM %s e WHERE e.id = %s",
            $tableName,
            $id
        );

        $deleted = $this->database->sqlQuery($sqlQuery)->rowCount();

        return $deleted;
    }

    public function getById(string $tableName, string $class, int $id): EntityInterface|null
    {
        $sqlQuery = sprintf(
            "SELECT * FROM %s e WHERE e.id = %s",
            $tableName,
            $id
        );

        $fetchedEntity = $this->database->sqlQuery($sqlQuery)->fetch();
        if (empty($fetchedEntity)) {
            return null;
        }

        $entity = new $class();
        $entity->fromArray($fetchedEntity);
        
        return $entity;
    }

    public function getAll(string $tableName, string $class): array
    {
        $entities = [];

        $sqlQuery = sprintf(
            "SELECT * FROM %s",
            $tableName,
        );

        $iterator = $this->database->sqlQuery($sqlQuery)->getIterator();
        while($iterator->valid()){
            $entity = $iterator->current();
            
            $newEntity = new $class();
            $newEntity->fromArray($entity);

            $entities[] = $newEntity;

            $entity = $iterator->next();
        }

        return $entities;
    }
}