<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;
use App\Models\Category;

class BusinessSeeder extends Seeder
{
    // public function run()
    // {
    //     Business::factory()->count(1000)->create();
    // }

    public function run()
    {
        // Get all categories
        $categories = Category::all();

        // Seed businesses
        foreach ($categories as $category) {
            // You can adjust the number of businesses per category based on your requirements
            $numBusinesses = rand(3, 8);

            Business::factory(Business::class)->count($numBusinesses)->create([
                'category_id' => $category->id,
            ]);
        }
    }
    
}
