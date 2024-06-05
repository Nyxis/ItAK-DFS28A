<?php

namespace App\JDR\Class;

use App\JDR\Trait\RollableTrait;
use InvalidArgumentException;

class GameMaster 
{
    use RollableTrait;

    public function __construct(
        private array $elements,
        private float $successRate,
        private float $critRate,
        private float $fumbleRate,
    ) {
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
}