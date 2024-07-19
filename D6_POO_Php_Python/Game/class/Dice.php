<?php

namespace App\Game\class;

use App\Game\interface\Randomize;

class Dice implements Randomize {
    //use App\Game\Loggable;
    private $sides;

    public function __construct($sides) {
        $this -> sides = $sides;
    }

    public function getSide() {
        return $this -> sides;
    }

    public function roll() {
        return rand(1, $this -> sides);
    }

}

?>