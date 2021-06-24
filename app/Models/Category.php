<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [''];

    //protected $with = ['product'];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class, 'cat_id');
    }

    public function children()
    {
        return $this->hasMany(Children::class, 'cat_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
