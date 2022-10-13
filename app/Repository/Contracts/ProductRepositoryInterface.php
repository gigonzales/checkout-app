<?php

namespace App\Repository\Contracts;

use App\Product;
use App\ProductList;

interface ProductRepositoryInterface
{
    public function getProducts(): ProductList;

    public function findProduct(string $sku): Product;
}
