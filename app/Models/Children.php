<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'child_id');
    }
}
