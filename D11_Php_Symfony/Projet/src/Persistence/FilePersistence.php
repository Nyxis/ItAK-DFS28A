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
        // dd($filePath);
        $data = json_decode(file_get_contents($this->projectDir . $filePath), true);
        $lastEntity = end($data);

        $pa = new PropertyAccessor();
        
        $properties = get_class_vars($entity::class);
        $entityArray = [];
        foreach ($properties as $property => $value) {
            $value = $pa->getValue($entity, $property);
            if($property == 'id'){
                $entityArray[$property] = ($lastEntity[$property] ?? 0) + 1;
                continue;
            } else if ($value instanceof EntityInterface) {
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

        $data[] = $entityArray;

        $dataEncoded = json_encode($data);
        return file_put_contents($this->projectDir . $filePath, $dataEncoded . PHP_EOL);
    }
}