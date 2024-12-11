<?php

class OrderComposite implements OrderComponent {
    private $components = [];
    private $orderName;

    public function __construct($orderName) {
        $this->orderName = $orderName;
    }

    public function add(OrderComponent $component) {
        $this->components[] = $component;
    }

    public function display($indent = 0) {
        echo str_repeat(" ", $indent) . "Order: " . $this->orderName . "\n";
        foreach ($this->components as $component) {
            $component->display($indent + 2);
        }
    }

    public function getPrice() {
        $total = 0;
        foreach ($this->components as $component) {
            $total += $component->getPrice();
        }
        return $total;
    }
}

?>