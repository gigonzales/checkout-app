<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Services\CheckoutServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(
        private CheckoutServiceInterface $service
    ) {
    }

    public function checkout(Request $request): JsonResponse
    {
        $items = $request->input('items');

        $checkout = new Checkout();
        $totalPrice = 0;
        foreach ($items as $item) {
            $itemSubTotal = $this->service->calculateSubTotal($item);
            $totalPrice += $itemSubTotal;

            $checkout->addToCart($item['sku'], $item['quantity'], $itemSubTotal);
        }

        $checkout->setTotal(round($totalPrice, 2));

        return response()->json($checkout->toArray());
    }
}
