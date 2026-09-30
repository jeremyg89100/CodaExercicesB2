<?php
const DELIVERY_PRICE = 4.90;
const REDUCTION = 0.10;

function cartTotalPrice(float $price, int $numberOfProducts, bool $hasReduction, bool $hasDelivery) : float
{
    $totalPrice = $price * $numberOfProducts;

    if ($hasReduction) {
        $totalPrice -= ($totalPrice * REDUCTION);
    }

    if ($hasDelivery) {
        $totalPrice += DELIVERY_PRICE;
    }

    return $totalPrice;
}
$price = 29.90;
$numberOfProducts = 3;
$hasReduction = true;
$hasDelivery = false;

echo "Total : " . cartTotalPrice($price, $numberOfProducts, $hasReduction, $hasDelivery) . PHP_EOL; 

/*  
    The most important variables to rename were the 4 variables and the name of the function. (So a, b, c and d).
    I tried to rename them to match the function's goal. 
*/
 
