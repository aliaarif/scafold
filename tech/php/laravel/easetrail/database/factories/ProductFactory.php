<?php
namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    protected $model = Product::class;

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
            'name' => $name,
            'slug' => $slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 300, 2000), // Random price between 300 and 2000
            'photo' => $this->faker->imageUrl(400, 300, 'laptop'),
            'images' => $this->faker->imageUrl(400, 300, 'laptop'),
            'vendor_id' => \App\Models\Vendor::factory(),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}

