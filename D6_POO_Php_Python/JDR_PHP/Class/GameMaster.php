<?php

namespace App\JDR\Class;

use App\JDR\Class\Action;
use InvalidArgumentException;

class GameMaster
{
    public function __construct(
        private array $elements = [],
    ) {
    }

    public function pleaseGiveMeACrit(Action $action) {
        $element = $this->elements[array_rand($this->elements)];
        Logger::log($element);
        if($message = $element->isInvalid()){
            throw new InvalidArgumentException($message);
        }

        $roll = (int)(100 * $element->lancer() / $element->getMax());
        return $action->calculateResult($roll);
    }
}