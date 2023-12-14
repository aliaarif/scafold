<?php
namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BusinessFactory extends Factory
{
    protected $model = Business::class;

    public function definition()
    {

        $name = $this->faker->word;
        $slug = Str::slug($name);
        // $imagesArr = [];

        // for ($i = 1; $i <= 4; $i++){
        // array_push($imagesArr, $this->faker->imageUrl(400, 300, 'laptop'));
        // array_push($imagesArr, $this->faker->imageUrl(400, 300, 'laptop'));
        // array_push($imagesArr, $this->faker->imageUrl(400, 300, 'laptop'));
        // array_push($imagesArr, $this->faker->imageUrl(400, 300, 'laptop'));
        // }

        return [
            'bid' => Str::random(8),
            'business_name' => $name,
            'business_slug' => $slug,
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}

