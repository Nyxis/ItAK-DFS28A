<?php

namespace App\Persistence;

use App\Interface\EntityInterface;
use App\Interface\PersistenceInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;

class FilePersistence implements PersistenceInterface
{
    public function __construct(
        private string $filePath,
        private string $projectDir,
    ) {
    }

    public function saveSingle(string $tableName, EntityInterface $entity): int|bool
    {
        $filePath = str_replace('__tablename__', $tableName, $this->filePath);
        $directory = $this->projectDir . $filePath;
        if(!is_dir($directory)) {
            mkdir($directory, 0777, true);
        } else {
            $files = glob( $directory ."*" );
            if( !empty($files) ) {
                $lastId = json_decode(file_get_contents(end($files)), true)['id'];
            }
        }

        $pa = new PropertyAccessor();
        $properties = get_class_vars($entity::class);

        $entityArray = [];
        $entityArray['id'] = ($lastId ?? 0) + 1;
        foreach ($properties as $property => $value) {
            $value = $pa->getValue($entity, $property);

            if ($value instanceof EntityInterface) {
                $entityArray[$property] = $value->id;
            } else if (is_array($value)) {
                $entityArray[$property] = array_map(function($obj) {
                    if ($obj instanceof EntityInterface) {
                        return $obj->id;
                    }
                    return $obj;
                }, $value);
            }
            
            $entityArray[$property] = $value;
        }

        $dataEncoded = json_encode($entityArray);

        return file_put_contents($this->projectDir . $filePath . $entityArray['id'] . '.json', $dataEncoded . PHP_EOL);
    }

    public function updateSingle(string $tableName, EntityInterface $entity): int|bool
    {
        $filePath = str_replace('__tablename__', $tableName, $this->filePath);

        $pa = new PropertyAccessor();
        $properties = get_class_vars($entity::class);

        $entityArray = [];
        $entityArray['id'] = $entity->getId();
        foreach ($properties as $property => $value) {
            $value = $pa->getValue($entity, $property);

            if ($value instanceof EntityInterface) {
                $entityArray[$property] = $value->id;
            } else if (is_array($value)) {
                $entityArray[$property] = array_map(function($obj) {
                    if ($obj instanceof EntityInterface) {
                        return $obj->id;
                    }
                    return $obj;
                }, $value);
            }
            
            $entityArray[$property] = $value;
        }

        $dataEncoded = json_encode($entityArray);

        return file_put_contents($this->projectDir . $filePath . $entityArray['id'] . '.json', $dataEncoded . PHP_EOL);
    }

    public function delete(string $tableName, string $class, int $id): bool
    {
        $filePath = str_replace('__tablename__', $tableName, $this->filePath);
        $file = $this->projectDir . $filePath . '/' . $id . '.json';
        if(!file_exists($file)) {
            return false;
        }

        return unlink($file);
    }

    public function getById(string $tableName, string $class, int $id): EntityInterface|null
    {
        $filePath = str_replace('__tablename__', $tableName, $this->filePath);
        $file = $this->projectDir . $filePath . '/' . $id . '.json';
        if(!file_exists($file)) {
            return false;
        }

        $fetchedEntity = json_decode($file, true);

        $entity = new $class();
        $entity->fromArray($fetchedEntity);

        return $entity;
    }

    public function getAll(string $tableName, string $class): array
    {
        $filePath = str_replace('__tablename__', $tableName, $this->filePath);
        $directory = $this->projectDir . $filePath;
        if(!is_dir($directory)) {
            return [];
        }

        $entities = [];

        $files = glob( $directory ."*" );
        if(empty($files)) {
            return [];
        }

        foreach ($files as $path) {
            $fetchedEntity = json_decode(file_get_contents($path), true);

            $entity = new $class();
            $entity->fromArray($fetchedEntity);

            $entities[] = $entity;
        }

        return $entities;
    }
}