<?php

namespace App\Domain\Product\Services;

use App\Domain\Product\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }
}