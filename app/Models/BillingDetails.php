<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    protected $guarded = [''];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function orderdetails()
    {
        return $this->belongsTo(OrderDetails::class, 'order_details_id');
    }
}
