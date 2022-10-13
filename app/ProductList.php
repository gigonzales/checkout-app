<?php

namespace App;

final class ProductList
{
    private array $list;

    public function __construct(
        Product ...$product
    ) {
        $this->list = $product;
    }

    public function add(Product $product): void
    {
        $this->list[] = $product;
    }

    public function all(): array
    {
        return $this->list;
    }
}
