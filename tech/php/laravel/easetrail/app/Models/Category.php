<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }

     public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    // public function ancestors()
    // {
    //     return $this->belongsToMany(Category::class, 'category_closure', 'descendant', 'ancestor')
    //         ->withPivot('depth')
    //         ->withTimestamps();
    // }

    // public function descendants()
    // {
    //     return $this->belongsToMany(Category::class, 'category_closure', 'ancestor', 'descendant')
    //         ->withPivot('depth')
    //         ->withTimestamps();
    // }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
