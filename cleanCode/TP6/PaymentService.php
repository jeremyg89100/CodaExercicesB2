<?php

require_once 'PaymentBank.php';
require_once 'PaymentStripe.php';
require_once 'PaymentPaypal.php';
require_once 'PaymentOnSite.php';
require_once 'GiftCardPayment.php';

interface PaymentService {
    public function pay(int $amount);
}
