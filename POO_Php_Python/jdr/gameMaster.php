<?php

class GameMaster {

    public $result;
    public $min_nb;
    public $max_nb;

    public function __construct($minValue = 1, $maxValue = 10) {

        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->result = $this->generateRandomResult();
    }

    public function generateRandomResult() {

        $result = rand($this->minValue, $this->maxValue);
        return $result;
    }

    public function getResult() {

        return $this->result;
    }

    public function __toString() {

        return $this->result;
    }
}

?>