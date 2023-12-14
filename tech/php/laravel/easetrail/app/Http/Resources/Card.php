<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Card extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'           => $this->id,
            'user_id'      => $this->user_id,
            'card_number'  => $this->card_number,
            'card_holder'  => $this->card_holder,
            'card_expiry'  => $this->card_expiry,
            'card_cvc'     => $this->card_cvc
        ];
    }
}

