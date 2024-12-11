<?php
// Exo 1 et 2
class RandomResult {

    public $result;
    public $min_nb;
    public $max_nb;

    public function __construct($minValue = 1, $maxValue = 100) {

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

        return "Result: " . $this->result . " ";
    }
}
?>