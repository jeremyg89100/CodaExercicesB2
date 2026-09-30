<?php

require_once 'NotificationSender.php';
require_once 'PaymentGateaway.php';

class OrderService {
    public function process() : void {
        $paymentGateaway = new PaymentGateaway();
        $paymentGateaway->redirectPaymentMethod('stripe');
        $paymentGateaway->redirectFakePaymentMethod('stripe');

        $sendMail = new SmtpMailer();
        $sendMail->send("test@gmail.com");

        $sendMailFake = new FakeNotificationSender();
        $sendMailFake->send("test@gmail.com");
    }
}
