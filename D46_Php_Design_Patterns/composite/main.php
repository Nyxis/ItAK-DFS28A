<?php 

$product1 = new Product("Laptop", 1000);
$product2 = new Product("Mouse", 50);
$product3 = new Product("Keyboard", 75);

$pack = new OrderComposite("Office Pack");
$pack->add($product2);
$pack->add($product3);

$order = new OrderComposite("Customer Order");
$order->add($product1);
$order->add($pack);

$order->display();
echo "Total Price: $" . $order->getPrice() . "\n";

?>