<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function children()
    {
        return $this->belongsTo(Children::class, 'child_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
