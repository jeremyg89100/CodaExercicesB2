<?php

const DISCOUNT = 5;
const APPLY_DISCOUNT = 100;
const VIP_DISCOUNT_TOTAL_ABOVE_100 = 0.90;
const VIP_DISCOUNT_TOTAL_LOWER_100 = 0.95;

class PaymentService
{
    public function paymentMethod(string $method, float $amount): void
    {
        $methodPayment = ['stripe', 'paypal'];
        if (in_array($method, $methodPayment, true)) {
            echo "{$method} payment: {$amount}" . PHP_EOL;
        } else {
            throw new InvalidArgumentException("Unsupported payment method");
        }
    }

    public function totalToPay(Order $order) : float {
        $total = 0;
        foreach ($order->items as $item) {
            $total += $item->product->price * $item->quantity;
        }
        if ($order->customer->vip === true) {
            $total = $total > APPLY_DISCOUNT ? $total * VIP_DISCOUNT_TOTAL_ABOVE_100 : $total * VIP_DISCOUNT_TOTAL_LOWER_100;
        }
        
        if ($total > APPLY_DISCOUNT) {
            $total -= DISCOUNT;
        }


        if ($total === 0) {
            throw new InvalidArgumentException("Your cart is at 0$");
        }

        return $total;
    }

    public function changeStatusToPaid(Order $order) : void {
        if ($order->status === 'paid') {
            throw new RuntimeException("The order has already been payed.");
        }

        $order->status = 'paid';
        echo "SQL INSERT order status={$order->status}" . PHP_EOL;
    }
}
