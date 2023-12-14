<?php

namespace App\Domain\Business\Repositories;

use App\Http\Resources\Business as BusinessResource;
use App\Domain\Business\Interfaces\BusinessInterface;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use App\Models\Business;
use Validator;
use DB;

class BusinessRepository implements BusinessInterface
{
    use ResponseAPI;

    // Get All Businesss
    public function getAllBusinesses()
    {
        try {
            $businesses = Business::paginate(4);
            return $this->sendResponse(
                BusinessResource::collection($businesses), 
                'Businesses Retrieved Successfully.'
            );
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    // Get Business Details By ID
    public function getBusinessById($id)
    {
        try {
            $business = Business::find($id);
            if (is_null($business)) {
                return $this->sendError(
                    'Business Not Found.',
                    404
                );
            }
            return $this->sendResponse(
            new BusinessResource($business), 
            'Business Retrieved Successfully.');
        } catch(\Exception $e) {
            return $this->sendError(
                $e->getMessage(), 
                $e->getCode()
            );
        }
    }
    
    // Get Business Details By Slug and ID
    public function getBusinessBySlug($slug, $id)
    {
        try {
            $business = Business::where('slug', $slug);
            if (is_null($business)) {
                return $this->sendError(
                    'Business Not Found.',
                    404
                );
            }
            return $this->sendResponse(
            new BusinessResource($business), 
            'Business Retrieved Successfully.');
        } catch(\Exception $e) {
            return $this->sendError(
                $e->getMessage(), 
                $e->getCode()
            );
        }
    }

    // Save Business
    public function saveBusiness(Request $request)
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
            $newBusiness = new Business;
            $newBusiness->name = $input['name'];
            $newBusiness->save();
            DB::commit();
            return $this->sendResponse(
                new BusinessResource($newBusiness), 
                'Business Created Successfully.'
            );
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->sendError(
                $e->getMessage(),
                $e->getCode(),
            );
        }
    }

    // Update Business
    public function updateBusiness(Request $request, $id)
    { 
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:Businesss,email,' . $id
        ]);
        DB::beginTransaction();
        try {
            $business = Business::find($id);
            if (is_null($business)) {
                return $this->sendError(
                    'Business not found.',
                    404
                );
            }
            $business->name = $input['name'];
            $business->detail = $input['detail'];
            $business->save();
            DB::commit();
            return $this->sendResponse(
                new BusinessResource($business), 
                'Business Updated Successfully.'
            );
        } catch(\Exception $e) {
            DB::rollBack();
            return $this->sendError(
                $e->getMessage(), 
                $e->getCode()
            );
        } 
    }

    // Delete Business
    public function deleteBusiness($id)
    {
        DB::beginTransaction();
        try {
            $business = Business::find($id);
            if(!$business) return $this->error(
                "No Business Found with ID $id", 
                404
            );
            $business->delete();
            DB::commit();
            return $this->sendResponse(
                "Business Deleted", 
                $business
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