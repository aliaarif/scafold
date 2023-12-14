<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Address extends JsonResource
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
            'name'         => $this->name,
            'address_line' => $this->address_line,
            'city'         => $this->city,
            'state'        => $this->state,
            'country'      => $this->country,
            'pin'          => $this->pin,
            'phone'        => $this->phone
        ];
    }
}
