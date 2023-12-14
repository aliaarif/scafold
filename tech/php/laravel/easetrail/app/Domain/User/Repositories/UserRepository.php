<?php

namespace App\Domain\User\Repositories;

use Intervention\Image\ImageManagerStatic as ImageManager;
use App\Http\Resources\User as UserResource;
use App\Domain\User\Interfaces\UserInterface;
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
use App\Models\User;
use GuzzleHttp\Client;
use Validator;
use DB;

class UserRepository implements UserInterface {
    
    use ResponseAPI;

//     public $client = new GuzzleHttp\Client(['base_uri' => 'http://httpbin.org']);

//     $res = $client->request('POST', $this->base_api . $endpoint, [
//     // 'auth'      => [ env('API_USERNAME'), env('API_PASSWORD') ],
//     'multipart' => [
//         [
//             'name'     => 'FileContents',
//             'contents' => file_get_contents($path . $name),
//             'filename' => $name
//         ],
//         [
//             'name'     => 'FileInfo',
//             'contents' => json_encode($fileinfo)
//         ]
//     ],
// ]);

   
    // Get All Users
    public function getAllUsers()
    {
        try {
            // $users = User::where('status', 1)->get();
            $users = User::get();
            return $this->sendResponse(
                UserResource::collection($users), 
                'Users Retrieved Successfully.'
            );
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    // Get User Details By ID
    public function getUserById($id) {
        try {
            $user = User::find($id);
            if (is_null($user)) {
                return $this->sendError(
                    'User Not Found.',
                    404
                );
            }
            return $this->sendResponse(
                new UserResource($user), 
                'User Retrieved Successfully.');
            } catch(\Exception $e) {
                return $this->sendError(
                    $e->getMessage(), 
                    $e->getCode()
                );
            }
        }
        
        
        // Get User Details By Slug 
        public function getUserBySlug($slug)
        {
          
            
            try {
                $user = User::where('slug', '=', $slug)->first();
                // $user = User::find($data->id);


                if (is_null($user)) {
                    return $this->sendError(
                        'User Not Found.',
                        404
                    );
                }
                return $this->sendResponse(
                    new UserResource($user), 
                    'User Retrieved Successfully.');
                } catch(\Exception $e) {
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                }
            }
            
            // Save User
            public function saveUser(Request $request)
            {   
                $input = $request->all();

              
                
                $validator = Validator::make($input, [
                    'name' => 'required|max:50',
                    // "file" => "required|mimes:ppt,pptx,doc,docx|max:1000096",
                    // 'category' => 'required'
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
                    // $file = $input['file'];
                    $newUser = new User;
                    $newUser->name = $name;
                    $newUser->slug = $slug;
;                   $newUser->vendor_id = ['vendor_id'];
                    $newUser->price = 2100;
                    $newUser->save();
                    DB::commit();
                    return $this->sendResponse(
                        new UserResource($newUser), 
                        'User Created Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(),
                        $e->getCode(),
                    );
                }
            }
                    
            // Update User
            public function updateUser(Request $request, $id)
            { 
                $input = $request->all();
                $validator = Validator::make($input, [
                    'name' => 'required|max:50',
                    'email' => 'required|email|unique:Users,email,' . $id
                ]);
                DB::beginTransaction();
                try {
                    $user = User::find($id);
                    if (is_null($user)) {
                        return $this->sendError(
                            'User not found.',
                            404
                        );
                    }
                    $user->name = $input['name'];
                    $user->detail = $input['detail'];
                    $user->save();
                    DB::commit();
                    return $this->sendResponse(
                        new UserResource($user), 
                        'User Updated Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                } 
            }
                    
            // Delete User
            public function deleteUser($id)
            {
                DB::beginTransaction();
                try {
                    $user = User::find($id);
                    if(!$user) return $this->error(
                        "No User Found with ID $id", 
                        404
                    );
                    $user->delete();
                    DB::commit();
                    return $this->sendResponse(
                        "User Deleted", 
                        $user
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                }
            }
            
            // Get All PPT Users
            // public function getAllPptUsers()
            // {
            //     try {
            //         $users = User::where('category_id', '=', 0)->get();
            //         return $this->sendResponse(
            //             UserResource::collection($users), 
            //             'Users Retrieved Successfully.'
            //         );
            //     } catch(\Exception $e) {
            //         return $this->error($e->getMessage(), $e->getCode());
            //     }
            // }
            
            // Get All Doc Users
            // public function getAllDocUsers()
            // {
            //     try {
            //         $users = User::where('category_id', '!=', 0)->get();
            //         return $this->sendResponse(
            //             UserResource::collection($users), 
            //             'Users Retrieved Successfully.'
            //         );
            //     } catch(\Exception $e) {
            //         return $this->error($e->getMessage(), $e->getCode());
            //     }
            // }
            
            
            // Get All Doc Users By Slug
            // public function getAllDocUsersBySlug($slug)
            // {
            //     $category = Category::where('slug', $slug)->first();
                
            //     try {
            //         $users = User::where('category_id', $category->id)->get();
            //         return $this->sendResponse(
            //             UserResource::collection($users), 
            //             'Users Retrieved Successfully.'
            //         );
            //     } catch(\Exception $e) {
            //         return $this->error($e->getMessage(), $e->getCode());
            //     }
            // }
        }