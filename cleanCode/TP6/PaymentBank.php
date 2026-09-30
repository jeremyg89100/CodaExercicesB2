<?php

class PaymentBank implements PaymentService {
    public function pay(int $amount) {
        echo "The payment of {$amount}$ with the bank has been successfull" . PHP_EOL;
    }
}
