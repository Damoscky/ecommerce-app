<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = ['id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
