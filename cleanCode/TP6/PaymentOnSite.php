<?php

class PaymentOnSite implements PaymentService {
    public function pay(int $amount) {
        echo "The payment of {$amount}$ on site has been successfull" . PHP_EOL;
    }
}
