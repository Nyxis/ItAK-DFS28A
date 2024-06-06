<?php

namespace App\JDR\Class;

use App\JDR\Class\Abstract\AbstractGameMaster;
use InvalidArgumentException;

class GameMaster extends AbstractGameMaster
{
    public function __construct(
        private array $elements = [],
    ) {
        parent::__construct();
    }

    public function pleaseGiveMeACrit() {
        $element = $this->elements[array_rand($this->elements)];
        Logger::log($element);
        if($message = $element->isInvalid()){
            throw new InvalidArgumentException($message);
        }

        $roll = (int)(100 * $element->lancer() / $element->getMax());
        return $this->calculateResult($roll);
    }
}