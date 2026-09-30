<?php

require_once 'PaymentDirector.php';
require_once 'PaymentService.php';


    $paymentDirector = new PaymentDirector();
    $methodPayment = ["paypal", "giftCard", "onSite", "bank", "stripe", "nonAuthorized"];

    foreach ($methodPayment as $method) {
        $paymentDirector->redirectPayment($method);
    }

