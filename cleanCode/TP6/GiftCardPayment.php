<?php

class GiftCardPayment implements PaymentService {
    public function pay(int $amount) {
        echo "The payment of {$amount}$ with a gift card has been successfull" . PHP_EOL;
    }
}
