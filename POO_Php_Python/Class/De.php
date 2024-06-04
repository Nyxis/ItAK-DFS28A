<?php

namespace App\JDR\Class;

use App\JDR\Exception\LancerException;
use App\JDR\Interface\MaterielInterface;

class De implements MaterielInterface
{
    public function __invoke(int $faces) {
        return $faces > 1;
    }

    public function __construct(
        private int $faces = 6,
    ) {
    }

    public function lancer() {
        return rand(1, $this->faces);
    }

    public function isInvalid(){
        if($this->faces < 1) {
            throw new LancerException("Un dé doit avoir au moins 1 face");
        }
        return false;
    }
}