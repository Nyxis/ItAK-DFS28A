<?php

namespace App\JDR\Class;

use App\JDR\Exception\LancerException;
use App\JDR\Interface\MaterielInterface;

class Piece implements MaterielInterface
{
    public function __invoke(int $nbLancers) {
        return $nbLancers > 1;
    }

    public function __construct(
        private int $nbLancers = 1,
    ) {
    }

    public function lancer() {
        if ($this->nbLancers == 0) {
            return 1;
        }
        $this->nbLancers--;
        return rand(0, 1) * $this->lancer();
    }

    public function isInvalid(){
        if($this->nbLancers < 1) {
            throw new LancerException("Le nombre de lancer doit être supérieur ou égal à 1");
        }
        return false;
    }

    public function getMax() {
        return $this->nbLancers;
    }
}