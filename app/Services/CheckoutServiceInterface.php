<?php

namespace App\Services;

interface CheckoutServiceInterface
{
    public function calculateSubTotal(array $item): float;
}
