<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Category\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    protected $categoryInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->categoryInterface->getAllCategories();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->categoryInterface->saveCategory($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->categoryInterface->getCategoryById($id);
    }

    /**
     * Display the specified resource by slug and id.
     */
    public function getCategoryBySlug($slug, $id)
    {
        return $this->categoryInterface->getCategoryBySlug($slug, $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->categoryInterface->updateCategory($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->categoryInterface->deleteCategory($id);
    }
}