<?php

namespace App\Domain\Role\Repositories;

use Intervention\Image\ImageManagerStatic as ImageManager;
use App\Http\Resources\Role as RoleResource;
use App\Domain\Role\Interfaces\RoleInterface;
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
use App\Models\Role;
use GuzzleHttp\Client;
use Validator;
use DB;

class RoleRepository implements RoleInterface {
    
    use ResponseAPI;
   
    // Get All Roles
    public function getAllRoles()
    {
        try {
            // $roles = Role::where('status', 1)->get();
            $roles = Role::get();
            return $this->sendResponse(
                RoleResource::collection($roles), 
                'Roles Retrieved Successfully.'
            );
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    // Get Role Details By ID
    public function getRoleById($id) {
        try {
            $role = Role::find($id);
            if (is_null($role)) {
                return $this->sendError(
                    'Role Not Found.',
                    404
                );
            }
            return $this->sendResponse(
                new RoleResource($role), 
                'Role Retrieved Successfully.');
            } catch(\Exception $e) {
                return $this->sendError(
                    $e->getMessage(), 
                    $e->getCode()
                );
            }
        }
        
        
        // Get Role Details By Slug 
        public function getRoleBySlug($slug)
        {
          
            
            try {
                $role = Role::where('slug', '=', $slug)->first();
                // $role = Role::find($data->id);


                if (is_null($role)) {
                    return $this->sendError(
                        'Role Not Found.',
                        404
                    );
                }
                return $this->sendResponse(
                    new RoleResource($role), 
                    'Role Retrieved Successfully.');
                } catch(\Exception $e) {
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                }
            }
            
            // Save Role
            public function saveRole(Request $request)
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
                    $newRole = new Role;
                    $newRole->name = $name;
                    $newRole->slug = $slug;
;                   $newRole->vendor_id = ['vendor_id'];
                    $newRole->price = 2100;
                    $newRole->save();
                    DB::commit();
                    return $this->sendResponse(
                        new RoleResource($newRole), 
                        'Role Created Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(),
                        $e->getCode(),
                    );
                }
            }
                    
            // Update Role
            public function updateRole(Request $request, $id)
            { 
                $input = $request->all();
                $validator = Validator::make($input, [
                    'name' => 'required|max:50',
                    'email' => 'required|email|unique:Roles,email,' . $id
                ]);
                DB::beginTransaction();
                try {
                    $role = Role::find($id);
                    if (is_null($role)) {
                        return $this->sendError(
                            'Role not found.',
                            404
                        );
                    }
                    $role->name = $input['name'];
                    $role->detail = $input['detail'];
                    $role->save();
                    DB::commit();
                    return $this->sendResponse(
                        new RoleResource($role), 
                        'Role Updated Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                } 
            }
                    
            // Delete Role
            public function deleteRole($id)
            {
                DB::beginTransaction();
                try {
                    $role = Role::find($id);
                    if(!$role) return $this->error(
                        "No Role Found with ID $id", 
                        404
                    );
                    $role->delete();
                    DB::commit();
                    return $this->sendResponse(
                        "Role Deleted", 
                        $role
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