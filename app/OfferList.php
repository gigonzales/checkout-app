<?php

namespace App;

class OfferList
{
    private array $list;

    public function __construct(
        Offer ...$offer
    ) {
        $this->list = $offer;
    }

    public function add(Offer $offer): void
    {
        $this->list[] = $offer;
    }

    public function all(): array
    {
        return $this->list;
    }
}
