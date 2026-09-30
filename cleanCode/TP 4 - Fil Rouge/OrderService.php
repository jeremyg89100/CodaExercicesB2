<?php

class OrderService
{
    public function process(Order $order, string $paymentMethod): void
    {
        $payment = new PaymentService();
        $total = $payment->totalToPay($order);
        $payment->paymentMethod($paymentMethod, $total);

        $payment->changeStatusToPaid($order);

        if ($order->status === 'paid'){
            $mailer = new Mailer();
            $mailer->send($order->customer->email, 'Order paid');

            $invoice = new InvoiceGenerator();
            $invoice->generate($order, $total);
        } else {
            throw new RuntimeException("The order has not been payed.");
        }
    }
}
