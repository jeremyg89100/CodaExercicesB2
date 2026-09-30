<?php

class PaymentPaypal implements PaymentService {
    public function pay(int $amount) {
        echo "The payment of {$amount}$ with Paypal has been successfull" . PHP_EOL;
    }
}
