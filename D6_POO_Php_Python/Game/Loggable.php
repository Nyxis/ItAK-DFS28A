<?php 

trait Loggable {
    public function log($message) {
        Logger::log($message);
    }
}

?> 