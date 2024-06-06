<?php

namespace App\JDR\Class;

use App\JDR\Interface\ThrowableInterface;
use App\JDR\Trait\StringableTrait;

class Deck implements ThrowableInterface
{
    use StringableTrait;
    
    public function __invoke(int $couleurs, int $valeurs) {
        return $couleurs > 1 && $valeurs > 1;
    }

    public function __construct(
        private int $couleurs = 3,
        private int $valeurs = 10,
    ) {
    }

    public function lancer() {
        $couleur = rand(1, $this->couleurs);
        $valeur = rand(1, $this->valeurs);
        return ($couleur - 1) * $this->valeurs + $valeur;
    }

    public function isInvalid(){
        if($this->couleurs < 1 || $this->valeurs < 1) {
            return "Le nombre de couleur et la valeur doivent être supérieurs ou égaux à 1";
        }
        return false;
    }

    public function getMax() {
        return $this->couleurs * $this->valeurs;
    }
}