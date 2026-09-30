<?php

function canPlaceOrder(array $customer, array $cart) : string {
    if ($customer['active']  === false) {
        return 'Compte inactif';
    }
    if ($customer['email_verified'] === false) {
        return 'Email non vérifié';
    }

    if ($customer['blocked'] === true) {
        return 'Compte bloqué';
    }

    if (count($cart) > 0) {
        if ($customer['country'] === 'FR' || $customer['country'] === 'BE') {
            return 'Commande autorisée';
        } else {
            return 'Pays non pris en charge';
        }
    } else {
        return 'Panier vide';
    }
}

$cases = [
    [['active' => true, 'email_verified' => true, 'blocked' => false, 'country' => 'FR'], ['sku-1']],
    [['active' => false, 'email_verified' => true, 'blocked' => false, 'country' => 'FR'], ['sku-1']],
    [['active' => true, 'email_verified' => false, 'blocked' => false, 'country' => 'FR'], ['sku-1']],
    [['active' => true, 'email_verified' => true, 'blocked' => true, 'country' => 'FR'], ['sku-1']],
    [['active' => true, 'email_verified' => true, 'blocked' => false, 'country' => 'US'], ['sku-1']],
    [['active' => true, 'email_verified' => true, 'blocked' => false, 'country' => 'FR'], []],
];

foreach ($cases as [$customer, $cart]) {
    echo canPlaceOrder($customer, $cart) . PHP_EOL;
}

/* I used some early returns to make it easier to understand */

