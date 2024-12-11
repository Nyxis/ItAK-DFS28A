<?php

class Product implements OrderComponent {
    private $name;
    private $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function display($indent = 0) {
        echo str_repeat(" ", $indent) . "Product: " . $this->name . " - $" . $this->price . "\n";
    }

    public function getPrice() {
        return $this->price;
    }
}

?>