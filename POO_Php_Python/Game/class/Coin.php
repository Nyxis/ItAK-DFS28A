<?php 

namespace App\Game\class;

use App\Game\interface\Randomize;

class Coin implements Randomize {
    //use App\Game\Loggable;
    private $flips;

    public function __construct($flips) {
        $this -> flips = $flips;
    }

    private function flip() {
        return rand(0, 1);
    }

    public function roll() {
        return $this -> flipRecursive($this -> flips);
    }

    private function flipRecursive($remainingThrows) {
        if ($remainingThrows == 0) {
            return 1;
        }
        return $this -> flip() && $this -> flipRecursive($remainingThrows - 1);
    }

    /*
    public function getMaxValue() {
        return $this->throws;
    }
    */

}

?>