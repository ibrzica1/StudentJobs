<?php

namespace App\Services;

class MoneyService
{
    public function calculatePrice(float $price, float $tax): float
    {
        $calculatedTax = ($price * $tax) / 100;
        $total = $calculatedTax + $price;
        return $total;
    }

    public function calculateTax(float $price, float $tax): float
    {
        $calculatedTax = ($price * $tax) / 100;
        return $calculatedTax;
    }
}