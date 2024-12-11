<?php
class Dice
{
    private $faces;

    public function __construct($faces)
    {
        $this->faces = $faces;
        $this->log("Dice with $faces faces created.");
    }

    public function roll()
    {
        $result = rand(1, $this->faces);
        $this->log("Dice rolled: $result");
        return $result;
    }

    public function log($message)
    {
        echo $message . PHP_EOL;
    }
}
