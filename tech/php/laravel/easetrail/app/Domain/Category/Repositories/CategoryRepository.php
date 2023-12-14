<?php

namespace App\Domain\Category\Repositories;

use App\Http\Resources\Category as CategoryResource;
use App\Domain\Category\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\Category;
use Validator;
use DB;

class CategoryRepository implements CategoryInterface
{
    use ResponseAPI;

    // Get All Categorys
    public function getAllCategories()
    {
        try {
            $categories = Category::paginate(12);
            return $this->sendResponse(
                CategoryResource::collection($categories), 
                'Categories Retrieved Successfully.'
            );
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    // Get Category Details By ID
    public function getCategoryById($id)
    {
        try {
            $category = Category::find($id);
            if (is_null($category)) {
                return $this->sendError(
                    'Category Not Found.',
                    404
                );
            }
            return $this->sendResponse(
            new CategoryResource($category), 
            'Category Retrieved Successfully.');
        } catch(\Exception $e) {
            return $this->sendError(
                $e->getMessage(), 
                $e->getCode()
            );
        }
    }
    
    // Get Category Details By Slug and ID
    public function getCategoryBySlug($slug, $id)
    {
        try {
            $category = Category::where('slug', $slug);
            if (is_null($category)) {
                return $this->sendError(
                    'Category Not Found.',
                    404
                );
            }
            return $this->sendResponse(
            new CategoryResource($category), 
            'Category Retrieved Successfully.');
        } catch(\Exception $e) {
            return $this->sendError(
                $e->getMessage(), 
                $e->getCode()
            );
        }
    }

    // Save Category
    public function saveCategory(Request $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:50',
            'slug' => 'required|unique'
        ]);
        if($validator->fails()){
            return $this->sendError(
                'Validation Error.', 
                $validator->errors()
            );       
        }

        DB::beginTransaction();   
        try {
            $newCategory = new Category;
            $newCategory->name = $input['name'];
            $newCategory->save();
            DB::commit();
            return $this->sendResponse(
                new CategoryResource($newCategory), 
                'Category Created Successfully.'
            );
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->sendError(
                $e->getMessage(),
                $e->getCode(),
            );
        }
    }

    // Update Category
    public function updateCategory(Request $request, $id)
    { 
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:Categorys,email,' . $id
        ]);
        DB::beginTransaction();
        try {
            $category = Category::find($id);
            if (is_null($category)) {
                return $this->sendError(
                    'Category not found.',
                    404
                );
            }
            $category->name = $input['name'];
            $category->detail = $input['detail'];
            $category->save();
            DB::commit();
            return $this->sendResponse(
                new CategoryResource($category), 
                'Category Updated Successfully.'
            );
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->sendError(
                $e->getMessage(), 
                $e->getCode()
            );
        } 
    }

    // Delete Category
    public function deleteCategory($id)
    {
        DB::beginTransaction();
        try {
            $category = Category::find($id);
            if(!$category) return $this->error(
                "No Category Found with ID $id", 
                404
            );
            $category->delete();
            DB::commit();
            return $this->sendResponse(
                "Category Deleted", 
                $category
            );
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->sendError(
                $e->getMessage(), 
                $e->getCode()
            );
        }
    }
}