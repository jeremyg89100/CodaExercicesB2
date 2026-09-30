<?php

class FakeStripePayment {
    public function pay(float $amount) : void {
        echo "FakeStripePayment : {$amount}$ has been paid successfully" . PHP_EOL;
    }
}
