<?php

require_once 'StripePayment.php';
require_once 'FakeStripePayment.php';

class PaymentGateaway {
    public function redirectPaymentMethod(string $methodPayment) : void {
        switch ($methodPayment){
            case 'stripe': 
                $stripe = new StripePayment();
                $stripe->pay(120);
                break;
        }
    }

    public function redirectFakePaymentMethod(string $methodPayment) : void {
        switch ($methodPayment){
            case 'stripe': 
                $stripe = new FakeStripePayment();
                $stripe->pay(140);
                break;
        }
    }
}
