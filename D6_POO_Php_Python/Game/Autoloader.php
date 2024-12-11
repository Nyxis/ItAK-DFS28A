<?php

namespace App\Game;

class Autoloader {
    const NAMESPACE_SEPARATOR = "\\";
    const FOLDER_SEPARATOR = "/";

    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class_name) {
        if(strpos($class_name, __NAMESPACE__ . self::NAMESPACE_SEPARATOR) === 0) {
            $class_name = str_replace(__NAMESPACE__ . self::NAMESPACE_SEPARATOR, '', $class_name);
            $class_name = str_replace(self::NAMESPACE_SEPARATOR, self::FOLDER_SEPARATOR, $class_name);
            require __DIR__. self::FOLDER_SEPARATOR . $class_name . '.php';
        }
    }
}

?>  