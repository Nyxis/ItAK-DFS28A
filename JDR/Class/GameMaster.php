<?php

namespace App\JDR\Class;

use App\JDR\Enum\TypeEnum;
use InvalidArgumentException;

class GameMaster 
{
    private array $elements;

    public function __construct(
        private float $successRate,
        private float $critRate,
        private float $fumbleRate,
    ) {
        $this->elements = [
            new De(4),
            new De(10),
            new Deck(3, 18),
            new Deck(4, 13),
            new Piece(1),
            new Piece(1),
        ];
    }

    public function pleaseGiveMeACrit() {
        $element = $this->elements[array_rand($this->elements)];
        Logger::log($element);
        if($message = $element->isInvalid()){
            throw new InvalidArgumentException($message);
        }

        $roll = 100 * $element->lancer() / $element->getMax();
        return $this->calculateResult($roll);
    }

    private function calculateResult($value) {
        Logger::log('Résultat du lancer : ' . $value);

        switch($value) {
            case $value <= $this->fumbleRate:
                return new Tirage(TypeEnum::FUMBLE);
                break;
            case $value <= $this->successRate:
                return new Tirage(TypeEnum::CRITICAL_SUCCESS);
                break;
            case $value <= $this->critRate:
                return new Tirage(TypeEnum::SUCCESS);
                break;
            default:
                return new Tirage(TypeEnum::FAILURE);
                break;
        }
    }
}