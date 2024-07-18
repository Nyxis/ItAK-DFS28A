<?php

namespace App\Persistence;

use App\Adapter\Database;
use App\Interface\EntityInterface;
use App\Interface\PersistenceInterface;

class DatabasePersistence implements PersistenceInterface
{
    public function __construct(private Database $database)
    {
        $this->database = $database;
    }

    public function saveSingle(string $tableName, EntityInterface $entity): int|bool
    {
        $properties = get_class_vars($entity::class);
        $entityArray = [];
        foreach ($properties as $property => $value) {
            if ($entity->$property instanceof EntityInterface) {
                $entityArray[] = $entity->$property->id;
                continue;
            } else if (is_array($entity->$property)) {
                $entityArray[] = '"' . json_encode(
                    array_map(function($obj) {
                        if ($obj instanceof EntityInterface) {
                            return $obj->id;
                        }
                        return $obj;
                    }, $entity->$property)
                ) . '"';
                continue;
            }
            
            $entityArray[] = $entity->$property ? '"' . $entity->$property . '"': 'null';
        }

        $sqlQuery = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $tableName,
            implode(',', array_keys($properties)),
            implode(',', $entityArray)
        );

        return $this->database->sqlQuery($sqlQuery);
    }
}