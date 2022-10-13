<?php

namespace App\Repository;

use App\Offer;
use App\OfferList;
use App\Repository\Contracts\OfferRepositoryInterface;

class OfferRepository implements OfferRepositoryInterface
{
    private OfferList $list;

    public function __construct()
    {
        $this->list = $this->buildOfferList();
    }

    public function getOffers(): OfferList
    {
        return $this->list;
    }

    public function findOffer(string $sku): Offer|array
    {
        $offers = $this->list->all();
        $item = [];
        foreach ($offers as $offer) {
            if ($sku == $offer->getSKU()) {
                $item = $offer;
            }
        }

        return $item;
    }

    public function buildOfferList(): OfferList
    {
        $offers = file_get_contents("../resources/offers.json");

        $offerList = new OfferList();

        foreach (json_decode($offers) as $offer) {
            $offerList->add(new Offer($offer->condition, $offer->offer, $offer->type, $offer->sku));
        }

        return $offerList;
    }
}
