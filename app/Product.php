<?php

namespace App;

use JetBrains\PhpStorm\ArrayShape;

class Product
{
    public function __construct(
        private string $sku,
        private string $name,
        private float $price
    ) {
    }

    public function getSKU(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    #[ArrayShape([
        'sku' => "string",
        'name' => "string",
        'price' => "float"
    ])]
    public function toArray(): array
    {
        return [
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price
        ];
    }
}
