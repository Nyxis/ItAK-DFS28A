<?php

namespace App\JDR\Class;

use App\JDR\Interface\ThrowableInterface;
use App\JDR\Trait\StringableTrait;

class Piece implements ThrowableInterface
{
    use StringableTrait;
    
    public function __invoke(int $nbLancers) {
        return $nbLancers > 1;
    }

    public function __construct(
        private int $nbLancers = 1,
    ) {
    }

    public function lancer() {
        return $this->lancerRecursive($this->nbLancers);
    }

    public function lancerRecursive(int $lancersRestants) {
        if ($lancersRestants == 0) {
            return 1;
        }
        return rand(0, 1) * $this->lancerRecursive($lancersRestants-1);
    }

    public function isInvalid(){
        if($this->nbLancers < 1) {
            return "Le nombre de lancer doit etre superieur ou egal a 1";
        }
        return false;
    }

    public function getMax() {
        return $this->nbLancers;
    }
}