<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    // public function run()
    // {
    //     Category::factory()->count(10)->create();
    // }


    public function run()
    {
        // Seed root categories
        $categories = [
            ['name' => 'Hire On', 'slug' => 'hire-on'],
            ['name' => 'Daily Need', 'slug' => 'daily-need'],
            ['name' => 'Personal Care', 'slug' => 'personal-care'],
            ['name' => 'Medical', 'slug' => 'medical'],
            ['name' => 'Education', 'slug' => 'education'],
            ['name' => 'House Hold', 'slug' => 'house-hold'],
            ['name' => 'Public Services', 'slug' => 'public-services'],
            ['name' => 'Marriage', 'slug' => 'marriage'],
            ['name' => 'Sports Hobbies', 'slug' => 'sports-hobbies'],
            ['name' => 'Internet', 'slug' => 'internet'],
            ['name' => 'Restaurant', 'slug' => 'restaurant'],
            ['name' => 'Electronic Store', 'slug' => 'electronic-store']
        ];

        // $categories = [
        //     ['name' => 'Hire On'],
        //     ['name' => 'Daily Need'],
        //     ['name' => 'Personal Care'],
        //     ['name' => 'Medical'],
        //     ['name' => 'Education'],
        //     ['name' => 'House Hold'],
        //     ['name' => 'Public Services'],
        //     ['name' => 'Marriage'],
        //     ['name' => 'Sports Hobbies'],
        //     ['name' => 'Internet'],
        //     ['name' => 'Restaurant'],
        //     ['name' => 'Electronic Store']
        // ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);
            // Seed child categories
            // $this->seedChildren($category, random_int(2, 5));
            $numChildren = random_int(1, 3);
            for ($i = 1; $i <= $numChildren; $i++) {
                $catName = Str::random(8) .'-'. $i;
                $childData = ['name' => 'Subcategory of '.$category->name.'-'.$i, 'slug' => Str::slug('Subcategory of '.$category->name.'-'.$i), 'parent_id' => mt_rand(1, 12)];
                $child = Category::create($childData);
            }

        }
    }

    // protected function seedChildren(Category $parent, $depth)
    // {
    //     if ($depth <= 0) {
    //         return;
    //     }

    //     $childCategories = [];

    //     // Adjust the number of child categories as needed
    //     $numChildren = random_int(1, 3);

    //     for ($i = 1; $i <= $numChildren; $i++) {
    //         // $childData = ['name' => $parent->name . ' Subcategory ' . $i, 'slug' => Str::slug($parent->name . ' Subcategory ' . $i)];
    //         $childData = ['name' => $parent->name . ' Subcategory ' . $i];

    //         $child = Category::create($childData);

    //         // Associate child with parent in the closure table
    //         $parent->descendants()->attach($child, ['depth' => 1]);
            
    //         // Recursively seed children for the current child
    //         $this->seedChildren($child, $depth - 1);
    //     }
    // }
}
