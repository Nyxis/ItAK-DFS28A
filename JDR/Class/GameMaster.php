<?php

namespace App\JDR\Class;

use App\JDR\Enum\TypeEnum;
use InvalidArgumentException;

class GameMaster 
{
    public function __construct(
        private array $elements,
    ) {
    }

    public function pleaseGiveMeACrit() {
        $element = $this->elements[array_rand($this->elements)];
        if($message = $element->isInvalid()){
            throw new InvalidArgumentException($message);
        }
        $roll = 100 * $element->lancer() / $element->getMax();
        return $this->calculateResult($roll);
    }

    private function calculateResult($value) {
        switch($value) {
            case $value <= 5:
                return new Tirage(TypeEnum::FUMBLE);
                break;
            case $value <= 20:
                return new Tirage(TypeEnum::CRITICAL_SUCCESS);
                break;
            case $value <= 60:
                return new Tirage(TypeEnum::SUCCESS);
                break;
            default:
            return new Tirage(TypeEnum::FAILURE);
                break;
        }
    }
}