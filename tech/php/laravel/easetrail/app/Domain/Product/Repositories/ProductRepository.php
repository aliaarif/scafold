<?php

namespace App\Domain\Product\Repositories;

use Intervention\Image\ImageManagerStatic as ImageManager;
use App\Http\Resources\Product as ProductResource;
use App\Domain\Product\Interfaces\ProductInterface;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpPresentation\DocumentLayout;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Client;
use Validator;
use DB;

class ProductRepository implements ProductInterface {
    
    use ResponseAPI;

    // Get All Products
    public function getAllProducts()
    {
        try {
            $products = Product::get();
            return $this->sendResponse(
                ProductResource::collection($products), 
                'Products Retrieved Successfully.'
            );
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    // Get Product Details By ID
    public function getProductById($id) {
        try {
            $product = Product::find($id);
            if (is_null($product)) {
                return $this->sendError(
                    'Product Not Found.',
                    404
                );
            }
            return $this->sendResponse(
                new ProductResource($product), 
                'Product Retrieved Successfully.');
            } catch(\Exception $e) {
                return $this->sendError(
                    $e->getMessage(), 
                    $e->getCode()
                );
            }
        }
        
        // Get Product Details By Slug 
        public function getProductBySlug($slug) {
            try {
                $product = Product::where('slug', '=', $slug)->first();
                if (is_null($product)) {
                    return $this->sendError(
                        'Product Not Found.',
                        404
                    );
                }
                return $this->sendResponse(
                    new ProductResource($product), 
                    'Product Retrieved Successfully.');
                } catch(\Exception $e) {
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                }
            }
            
            // Save Product
            public function saveProduct(Request $request)
            {   
                $input = $request->all();
                $validator = Validator::make($input, [
                    'name' => 'required|max:50'
                ]);
                if($validator->fails()){
                    return $this->sendError(
                        'Validation Error.', 
                        $validator->errors()
                    );       
                }
                
                DB::beginTransaction();   
                try {
                    $name = $input['name'];
                    $slug = Str::slug($name);
                    $newProduct = new Product;
                    $newProduct->name = $name;
                    $newProduct->slug = $slug;
;                   $newProduct->vendor_id = ['vendor_id'];
                    $newProduct->price = 2100;
                    $newProduct->save();
                    DB::commit();
                    return $this->sendResponse(
                        new ProductResource($newProduct), 
                        'Product Created Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(),
                        $e->getCode(),
                    );
                }
            }
                    
            // Update Product
            public function updateProduct(Request $request, $id)
            { 
                $input = $request->all();
                $validator = Validator::make($input, [
                    'name' => 'required|max:50',
                    'email' => 'required|email|unique:Products,email,' . $id
                ]);
                DB::beginTransaction();
                try {
                    $product = Product::find($id);
                    if (is_null($product)) {
                        return $this->sendError(
                            'Product not found.',
                            404
                        );
                    }
                    $product->name = $input['name'];
                    $product->detail = $input['detail'];
                    $product->save();
                    DB::commit();
                    return $this->sendResponse(
                        new ProductResource($product), 
                        'Product Updated Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                } 
            }
                    
            // Delete Product
            public function deleteProduct($id)
            {
                DB::beginTransaction();
                try {
                    $product = Product::find($id);
                    if(!$product) return $this->error(
                        "No Product Found with ID $id", 
                        404
                    );
                    $product->delete();
                    DB::commit();
                    return $this->sendResponse(
                        "Product Deleted", 
                        $product
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