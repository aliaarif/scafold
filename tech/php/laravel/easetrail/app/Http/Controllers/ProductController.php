<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Product\Interfaces\ProductInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ProductController extends Controller
{
    protected $productInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(ProductInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->productInterface->getAllProducts();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->productInterface->saveProducts($request);
    }

    /**
     * Display the specified resource by id.
     */
    public function show($id)
    {
        return $this->productInterface->getProductsById($id);
    }

    /**
     * Display the specified resource by slug and id.
     */
    public function getProductsBySlug($slug)
    {
        return $this->productInterface->getProductsBySlug($slug);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->productInterface->updateProducts($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->productInterface->deleteProducts($id);
    }
}