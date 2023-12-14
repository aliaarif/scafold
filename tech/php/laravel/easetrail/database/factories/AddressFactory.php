<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {

        $indianStatesAndCities = [
            'Rajasthan' => ['Sadulpur', 'Churu', 'Jaipur', 'Bikaner', 'Kakinada'],
            'Gurugram' => ['Sector 10', 'Sector 14', 'Sector 15', 'Sector 48', 'Sector 56'],
            // ... Add more states and cities here
        ];
    
        $state = $this->faker->randomElement(array_keys($indianStatesAndCities));
        $cities = $indianStatesAndCities[$state];

        return [
            'name' => $this->faker->name,
            'address_line' => $this->faker->streetAddress,
            'city' => $this->faker->randomElement($cities),
            'state' => $state,
            'country' => 'India',
            'pin' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'user_id' => \App\Models\User::factory(),

        ];
    }
}
