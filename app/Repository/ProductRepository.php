<?php

namespace App\Repository;

use App\Product;
use App\ProductList;
use App\Repository\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private ProductList $list;

    public function __construct()
    {
        $this->list = $this->buildProductList();
    }

    public function getProducts(): ProductList
    {
        return $this->list;
    }

    public function findProduct(string $sku): Product
    {
        $products = $this->list->all();
        $item = [];
        foreach ($products as $product) {
            if ($sku == $product->getSKU()) {
                $item = $product;
            }
        }

        return $item;
    }

    private function buildProductList(): ProductList
    {
        $products = file_get_contents("../resources/products.json");

        $productList = new ProductList();

        foreach (json_decode($products) as $product) {
            $productList->add(new Product($product->sku, $product->name, $product->price));
        }

        return $productList;
    }
}
