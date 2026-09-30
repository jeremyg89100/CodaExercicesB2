<?php

class StripePayment {
    public function pay(float $amount) : void {
        echo "STRIPE : {$amount}$ has been paid successfully" . PHP_EOL;
    }
}
