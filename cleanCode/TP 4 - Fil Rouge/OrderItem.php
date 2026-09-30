<?php

class OrderItem
{
    public function __construct(
        public Product $product,
        public int $quantity
    ) {}
}
