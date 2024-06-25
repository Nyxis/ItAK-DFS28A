<?php

namespace App\JDR\Class;

use App\JDR\Enum\LoggerEnum;

class Logger {
    public static function log(mixed $data, LoggerEnum $logger = LoggerEnum::DISPLAY) {
        switch($logger) {
            case LoggerEnum::DISPLAY:
                echo $data . PHP_EOL;
                break;
            case LoggerEnum::DEBUG:
                var_dump($data);
                die;
        }
    }
}
