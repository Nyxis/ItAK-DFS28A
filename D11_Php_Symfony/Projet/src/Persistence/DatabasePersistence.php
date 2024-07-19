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

        return $this->database->sqlQuery($sqlQuery);
    }
}