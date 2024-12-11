<?php
class Deck
{
    private $colors;
    private $values;

    public function __construct($colors, $values)
    {
        $this->colors = $colors;
        $this->values = $values;
        $this->log("Deck with $colors colors and $values values created.");
    }

    public function draw()
    {
        $color = rand(1, $this->colors);
        $value = rand(1, $this->values);
        $result = "Color: $color, Value: $value";
        $this->log("Card drawn: $result");
        return $result;
    }

    public function log($message)
    {
        echo $message . PHP_EOL;
    }
}
