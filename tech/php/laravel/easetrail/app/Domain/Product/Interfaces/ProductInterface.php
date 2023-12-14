<?php

namespace App\Domain\Product\Interfaces;

use Illuminate\Http\Request;

interface ProductInterface
{
    public function getAllProducts();
    public function getProductById($id);
    public function getProductBySlug($slug);
    public function saveProduct(Request $request);
    public function updateProduct(Request $request, $id);
    public function deleteProduct($id);
}