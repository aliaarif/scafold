<?php

namespace App\Domain\Category\Services;

use App\Domain\Category\Repositories\CategoryRepository;
// use Maatwebsite\Excel\Facades\Excel;

class ExportService
{
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }
}