<?php

namespace App\Domain\Product\Services;

use App\Domain\Product\Repositories\ProductRepository;
// use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }
}