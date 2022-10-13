<?php

namespace App\Repository\Contracts;

use App\Offer;
use App\OfferList;

interface OfferRepositoryInterface
{
    public function getOffers(): OfferList;

    public function findOffer(string $sku): Offer|array;
}
