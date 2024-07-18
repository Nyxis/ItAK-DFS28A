<?php 

namespace App\JDR;

class Autoloader {
    const NAMESPACE_SEPARATOR = "\\";

    public function __invoke($class_name)
    {
        if (strpos($class_name, __NAMESPACE__ . self::NAMESPACE_SEPARATOR) === 0)
        {
            $class_name = str_replace(__NAMESPACE__ . self::NAMESPACE_SEPARATOR, '', $class_name);
            $class_name = str_replace(self::NAMESPACE_SEPARATOR, DIRECTORY_SEPARATOR, $class_name);
            require __DIR__. DIRECTORY_SEPARATOR . $class_name . '.php';
        }
    }
}