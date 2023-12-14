<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    protected $model = PaymentMethod::class;

    public function definition()
    {
        return [
            'card' => 'Active',
            'upi' => 'Inactive',
            'cod' => 'Inactive',
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
