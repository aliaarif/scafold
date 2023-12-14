<?php

namespace App\Domain\Category\Services;

use App\Domain\Category\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }
}