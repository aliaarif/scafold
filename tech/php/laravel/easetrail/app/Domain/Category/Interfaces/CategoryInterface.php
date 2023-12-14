<?php

namespace App\Domain\Category\Interfaces;

use Illuminate\Http\Request;

interface CategoryInterface
{
    public function getAllCategories();
    public function getCategoryById($id);
    public function getCategoryBySlug($slug, $id);
    public function saveCategory(Request $request);
    public function updateCategory(Request $request, $id);
    public function deleteCategory($id);
}