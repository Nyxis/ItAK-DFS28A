<?php

namespace App\JDR\Class;

use App\JDR\Enum\TypeEnum;
use App\JDR\Exception\LancerException;

class GameMaster 
{
    public function __construct(
        private array $elements,
    ) {
    }

    public function pleaseGiveMeACrit() {
        $element = $this->elements[array_rand($this->elements)];
        if($message = $element->isInvalid()){
            throw new LancerException($message);
        }
        $roll = $element->lancer();
        return $this->calculateResult($roll);
    }

    private function calculateResult($value) {
        $percent = rand(1, 100);

        switch($percent) {
            case $percent <= 5:
                return new Tirage(TypeEnum::FUMBLE);
                break;
            case $percent <= 20:
                return new Tirage(TypeEnum::CRITICAL_SUCCESS);
                break;
            case $percent <= 60:
                return new Tirage(TypeEnum::SUCCESS);
                break;
            default:
            return new Tirage(TypeEnum::FAILURE);
                break;
        }
    }
}