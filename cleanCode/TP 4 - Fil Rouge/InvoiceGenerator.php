<?php

class InvoiceGenerator
{
    public function generate(Order $order, float $total): void
    {
        echo "INVOICE {$order->customer->email}: {$total}" . PHP_EOL;
    }
}
