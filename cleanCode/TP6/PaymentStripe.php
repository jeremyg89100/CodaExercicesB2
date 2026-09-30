<?php

class PaymentStripe implements PaymentService {
    public function pay(int $amount) {
        echo "The payment of {$amount}$ with Stripe has been successfull" . PHP_EOL;
    }
}
