<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                
            'name' => 'sometimes|max:50',
            'email' => 'sometimes|unique:users,email,'.$this->user()->id,
            'mobile' => 'sometimes|digits_between:10,10|unique:users,mobile,'.$this->user()->id,
            'username' => 'sometimes|unique:users,username,'.$this->user()->id,
            'gender' => 'sometimes|max:6',
            'birth_date' => 'sometimes|date_format:d-m-Y',
            'avatar' => 'sometimes|image|mimes:jpg,png,jpeg,webp|max:2048',

        ];
    }
}
