<?php

namespace App\Services;

use App\Repository\Contracts\OfferRepositoryInterface;
use App\Repository\Contracts\ProductRepositoryInterface;

class CheckoutService implements CheckoutServiceInterface
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private OfferRepositoryInterface $offerRepository
    ) {
    }

    public function calculateSubTotal(array $item): float
    {
        $offer = $this->offerRepository->findOffer($item['sku']);
        $product = $this->productRepository->findProduct($item['sku']);

        if ($offer) {
            if ($item['quantity'] >= $offer->getCondition()) {
                $totalPrice = 0;
                switch ($offer->getType()) {
                    case 'discount':
                        $discount = ($offer->getOffer() / 100.00) * $product->getPrice();
                        $totalPrice += ($product->getPrice() - $discount) * $item['quantity'];
                        break;
                    case 'bogo':
                        $offerCount = floor($item['quantity'] / $offer->getCondition());
                        $totalPrice += $product->getPrice() * ($item['quantity'] - $offerCount);
                        break;
                }

                return $totalPrice;
            }
        }

        return $product->getPrice() * $item['quantity'];
    }
}
