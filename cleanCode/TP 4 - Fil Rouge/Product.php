<?php

class Product
{
    public function __construct(
        public string $sku,
        public string $name,
        public float $price
    ) {}
}
