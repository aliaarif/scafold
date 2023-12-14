<?php

namespace App\Domain\Address\Repositories;

use App\Http\Resources\Address as AddressResource;
use App\Domain\Address\Interfaces\AddressInterface;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use Illuminate\Support\Str;
use App\Models\Address;
use Validator;
use DB;

class AddressRepository implements AddressInterface {
    
    use ResponseAPI;

    // Get All Addresss
    public function getAllAddresses()
    {
        try {
            $addresss = Address::get();
            return $this->sendResponse(
                AddressResource::collection($addresss), 
                'Addresss Retrieved Successfully.'
            );
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    // Get Address Details By ID
    public function getAddressById($id) {
        try {
            $address = Address::find($id);
            if (is_null($address)) {
                return $this->sendError(
                    'Address Not Found.',
                    404
                );
            }
            return $this->sendResponse(
                new AddressResource($address), 
                'Address Retrieved Successfully.');
            } catch(\Exception $e) {
                return $this->sendError(
                    $e->getMessage(), 
                    $e->getCode()
                );
            }
        }
        
        // Get Address Details By Slug 
        public function getAddressBySlug($slug) {
            try {
                $address = Address::where('slug', '=', $slug)->first();
                if (is_null($address)) {
                    return $this->sendError(
                        'Address Not Found.',
                        404
                    );
                }
                return $this->sendResponse(
                    new AddressResource($address), 
                    'Address Retrieved Successfully.');
                } catch(\Exception $e) {
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                }
            }
            
            // Save Address
            public function saveAddress(Request $request)
            {   
                $input = $request->all();
                $validator = Validator::make($input, [
                    'user_id' => 'required',
                    'name' => 'required',
                    'address_line' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'country' => 'required',
                    'pin' => 'required',
                    'phone' => 'required'
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
                    $newAddress = new Address;
                    $newAddress->name = $name;
                    $newAddress->slug = $slug;
;                   $newAddress->vendor_id = ['vendor_id'];
                    $newAddress->price = 2100;
                    $newAddress->save();
                    DB::commit();
                    return $this->sendResponse(
                        new AddressResource($newAddress), 
                        'Address Created Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(),
                        $e->getCode(),
                    );
                }
            }
                    
            // Update Address
            public function updateAddress(Request $request, $id)
            { 
                $input = $request->all();
                $validator = Validator::make($input, [
                    'user_id' => 'required',
                    'name' => 'required',
                    'address_line' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'country' => 'required',
                    'pin' => 'required',
                    'phone' => 'required'
                ]);
                DB::beginTransaction();
                try {
                    $address = Address::find($id);
                    if (is_null($address)) {
                        return $this->sendError(
                            'Address not found.',
                            404
                        );
                    }
                    $address->name = $input['name'];
                    $address->detail = $input['detail'];
                    $address->save();
                    DB::commit();
                    return $this->sendResponse(
                        new AddressResource($address), 
                        'Address Updated Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                } 
            }
                    
            // Delete Address
            public function deleteAddress($id)
            {
                DB::beginTransaction();
                try {
                    $address = Address::find($id);
                    if(!$address) return $this->error(
                        "No Address Found with ID $id", 
                        404
                    );
                    $address->delete();
                    DB::commit();
                    return $this->sendResponse(
                        "Address Deleted", 
                        $address
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