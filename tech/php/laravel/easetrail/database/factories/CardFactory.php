<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    protected $model = Card::class;

    public function definition()
    {
        return [
            'card_number' => $this->faker->creditCardNumber,
            'card_holder' => $this->faker->name,
            'card_expiry' => $this->faker->creditCardExpirationDate,
            'card_cvc' => $this->faker->randomNumber(3),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
