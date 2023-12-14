<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use Illuminate\Http\Request;
use App\Models\Category;

use Carbon\Carbon;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::any('/', function () {
//     return view('welcome');
// });


Route::get('/{city?}/{query?}', function(Request $request, $city = null, $query = null){
   

    if(!$city){
        $city = 'gurugram';
        $categories = Category::where('parent_id', '=', 0)->paginate(12);

        // SitemapGenerator::create('http://dev.easetrail-api')->writeToFile('sitemap.xml');
        // SitemapGenerator::create('https://example.com')
        // ->getSitemap()
        // // here we add one extra link, but you can add as many as you'd like
        // ->add(Url::create('/extra-page')->setPriority(0.5))
        // ->writeToFile('sitemap.xml');


        return view('category', compact('categories', 'city'));
    } else if($city && !$query){
        $categories = Category::where('parent_id', 0)->paginate(12);
        return view('category', compact('categories', 'city'));
    } else if($city && $query){
        $categoryId = Category::where('slug', $query)->pluck('id');
        $categories = Category::whereIn('parent_id', $categoryId)->get();
        if(count($categories) > 0){
            return view('subcategory', compact('categories', 'city'));
        }else{
            return 'Business Listing and Business Details';
        }
       
    }

});



// Route::get('/', function () {
//     echo phpinfo();
// });



// Route::get('/import', [ImportController::class, 'import'])->name('import');