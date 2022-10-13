<?php

namespace App;

use JetBrains\PhpStorm\ArrayShape;

class Offer
{
    public function __construct(
        private int $condition,
        private int $offer,
        private string $type,
        private string $sku
    ) {
    }

    public function getCondition(): int
    {
        return $this->condition;
    }

    public function getOffer(): int
    {
        return $this->offer;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    #[ArrayShape([
        "condition" => "int",
        "offer" => "int",
        "type" => "string",
        "sku" => "string"
    ])]
    public function __toArray(): array
    {
        return [
            "condition" => $this->condition,
            "offer" => $this->offer,
            "type" => $this->type,
            "sku" => $this->sku
        ];
    }
}
