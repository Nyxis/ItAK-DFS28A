<?php

namespace App\Game\class;

use App\Game\interface\Randomize;

class Deck implements Randomize {
    // use App\Game\Loggable;
    private $color;
    private $value;
    
    public function __construct($color, $value) {
        $this->color = $color;
        $this->value = $value;
    }

    public function getMaxValue() {
        return $this->color * $this->value;
    }

    public function roll() {
        /*$color = rand(1, $this->color);
        $value = rand(1, $this->value);
        return ($color - 1) * $this -> value + $value;*/
        return rand(1, $this -> getMaxValue());
    }

  
}

?>