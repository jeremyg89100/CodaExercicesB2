<?php

class PaymentDirector {
    public function redirectPayment(string $paymentMethod) {
        try {
            switch($paymentMethod) {
                case 'paypal':
                    $paymentPaypal = new PaymentPaypal();
                    $paymentPaypal->pay(100);
                    break;
                case 'bank':
                    $paymentBank = new PaymentBank();
                    $paymentBank->pay(210);
                    break;

                case 'stripe':
                    $paymentStripe = new PaymentStripe();
                    $paymentStripe->pay(320);
                    break;

                case 'onSite':
                    $paymentOnSite = new PaymentOnSite();
                    $paymentOnSite->pay(90);
                    break;

                case 'giftCard':
                    $giftCardPayment = new GiftCardPayment();
                    $giftCardPayment->pay(120);
                    break;

                default:
                    throw new InvalidArgumentException("Payment method unknown");
            } 
        } catch (InvalidArgumentException $e) {
            echo "Error catched : {$e->getMessage()}" . PHP_EOL;
        }
    }
}
