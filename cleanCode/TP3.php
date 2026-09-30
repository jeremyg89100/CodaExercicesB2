<?php

class OrderService
{

    public function process(array $order): void
    {
        $total = (new Money()) -> totalPriceOrder($order);
        $email = (new Email()) -> validateEmail($order);

        echo "SAVE order for {$email} - total={$total}" . PHP_EOL;
        echo "EMAIL to {$email} - order confirmed" . PHP_EOL;
        echo "INVOICE total={$total}" . PHP_EOL;
    }
}

class Email {
    public function validateEmail(array $order) : string {
        if (!filter_var($order['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email invalide');
        } 
        return $order['email'];
    }
}

class Money {
    public function totalPriceOrder(array $order) : float {
        if (!in_array($order['status'], ['pending', 'paid', 'cancelled'], true)) {
            throw new InvalidArgumentException('Statut invalide');
        }

        if ($order['unit_price'] <= 0 || $order['quantity'] <= 0) {
            throw new InvalidArgumentException('Commande invalide');
        }

        $total = $order['unit_price'] * $order['quantity'];

        if ($total > 100) {
            $total = $total * 0.90;
        }

        return $total;
    }
}

$order = [
    'email' => 'lea@example.com',
    'status' => 'paid',
    'unit_price' => 29.90,
    'quantity' => 4,
];

try {
    (new OrderService())->process($order);
} catch (InvalidArgumentException $e) {
    echo "Erreur attrapée : {$e->getMessage()}" . PHP_EOL;
}
