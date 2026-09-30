<?php

class Order
{
    public array $items = [];
    public string $status = 'pending';

    public function __construct(public Customer $customer) {}

    public function addItem(OrderItem $item): void
    {
        $this->items[] = $item;
    }

    public function verifyOrder() : void {
        foreach ($this->items as $index => $item) {
            if ($item->quantity === 0) {
                unset($this->items[$index]);
            }
        }

        if (count($this->items) === 0 ) {
            throw new RuntimeException('Empty order');
        }
    }
}
