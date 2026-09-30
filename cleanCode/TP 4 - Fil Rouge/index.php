<?php

require_once 'Customer.php';
require_once 'Product.php';
require_once 'OrderItem.php';
require_once 'Order.php';
require_once 'OrderService.php';
require_once 'PaymentService.php';
require_once 'Mailer.php';
require_once 'InvoiceGenerator.php';

try {
    $customer = new Customer('lea@example.com', false);
    $customer->verifyEmail($customer->email);
    $customer->changeVIPStatus();

    $product = new Product('SKU-001', 'Clavier', 79.90);
    $product2 = new Product('SKU-002', 'Souris', 20 );

    $order = new Order($customer);
    $order1 = new OrderItem($product, 2);
    $order2 = new OrderItem($product2, 0);
    $order->addItem($order1);
    $order->addItem($order2);
    $order->verifyOrder();

    (new OrderService())->process($order, 'stripe');

} catch (InvalidArgumentException | RuntimeException $e) {
    echo "Erreur attrapée : {$e->getMessage()}" . PHP_EOL;
}

