<?php

namespace App;

use JetBrains\PhpStorm\ArrayShape;

class Checkout
{
    public function __construct(
        private array $cart = [],
        private float $total = 0
    ) {
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;
        return $this;
    }

    public function getCart(): array
    {
        return $this->cart;
    }

    public function addToCart(string $sku, float $quantity, float $totalPrice): Checkout
    {
        $item['sku'] = $sku;
        $item['quantity'] = $quantity;
        $item['item_subtotal'] = round($totalPrice, 2);

        $this->cart[] = $item;
        return $this;
    }

    #[ArrayShape([
        "cart" => "array",
        "total_payment" => "float|int"
    ])]
    public function toArray(): array
    {
        return [
            "cart" => $this->cart,
            "total_payment" => $this->total
        ];
    }
}
