<?php

interface OrderComponent {
    public function display($indent = 0);
    public function getPrice();
}

?>