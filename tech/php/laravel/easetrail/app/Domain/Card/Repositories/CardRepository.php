<?php

namespace App\Domain\Card\Repositories;

use App\Http\Resources\Card as CardResource;
use App\Domain\Card\Interfaces\CardInterface;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Traits\ResponseAPI;
use Illuminate\Support\Str;
use App\Models\Card;
use Validator;
use DB;

class CardRepository implements CardInterface {
    
    use ResponseAPI;

    // Get All Cards
    public function getAllCards()
    {
        try {
            $cards = Card::get();
            return $this->sendResponse(
                CardResource::collection($cards), 
                'Cards Retrieved Successfully.'
            );
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }
    
    // Get Card Details By ID
    public function getCardById($id) {
        try {
            $card = Card::find($id);
            if (is_null($card)) {
                return $this->sendError(
                    'Card Not Found.',
                    404
                );
            }
            return $this->sendResponse(
                new CardResource($card), 
                'Card Retrieved Successfully.');
            } catch(\Exception $e) {
                return $this->sendError(
                    $e->getMessage(), 
                    $e->getCode()
                );
            }
        }
        
        // Get Card Details By Slug 
        public function getCardBySlug($slug) {
            try {
                $card = Card::where('slug', '=', $slug)->first();
                if (is_null($card)) {
                    return $this->sendError(
                        'Card Not Found.',
                        404
                    );
                }
                return $this->sendResponse(
                    new CardResource($card), 
                    'Card Retrieved Successfully.');
                } catch(\Exception $e) {
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                }
            }
            
            // Save Card
            public function saveCard(Request $request)
            {   
                $input = $request->all();
                $validator = Validator::make($input, [
                    'user_id' => 'required',
                    'name' => 'required',
                    'card_line' => 'required',
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
                    $newCard = new Card;
                    $newCard->name = $name;
                    $newCard->slug = $slug;
;                   $newCard->vendor_id = ['vendor_id'];
                    $newCard->price = 2100;
                    $newCard->save();
                    DB::commit();
                    return $this->sendResponse(
                        new CardResource($newCard), 
                        'Card Created Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(),
                        $e->getCode(),
                    );
                }
            }
                    
            // Update Card
            public function updateCard(Request $request, $id)
            { 
                $input = $request->all();
                $validator = Validator::make($input, [
                    'user_id' => 'required',
                    'name' => 'required',
                    'card_line' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'country' => 'required',
                    'pin' => 'required',
                    'phone' => 'required'
                ]);
                DB::beginTransaction();
                try {
                    $card = Card::find($id);
                    if (is_null($card)) {
                        return $this->sendError(
                            'Card not found.',
                            404
                        );
                    }
                    $card->name = $input['name'];
                    $card->detail = $input['detail'];
                    $card->save();
                    DB::commit();
                    return $this->sendResponse(
                        new CardResource($card), 
                        'Card Updated Successfully.'
                    );
                } catch(\Exception $e) {
                    DB::rollBack();
                    return $this->sendError(
                        $e->getMessage(), 
                        $e->getCode()
                    );
                } 
            }
                    
            // Delete Card
            public function deleteCard($id)
            {
                DB::beginTransaction();
                try {
                    $card = Card::find($id);
                    if(!$card) return $this->error(
                        "No Card Found with ID $id", 
                        404
                    );
                    $card->delete();
                    DB::commit();
                    return $this->sendResponse(
                        "Card Deleted", 
                        $card
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