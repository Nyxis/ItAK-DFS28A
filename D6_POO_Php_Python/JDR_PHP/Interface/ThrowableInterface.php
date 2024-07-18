<?php

namespace App\JDR\Interface;

interface ThrowableInterface {
    public function lancer();
    public function isInvalid();
    public function getMax();
}