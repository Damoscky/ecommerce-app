<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $with = ['order'];

    protected $guarded = [''];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function histories()
    {
        return $this->hasMany(OrderHistory::class, 'order_detail_id');
    }

    public function shippingaddress()
    {
        return $this->hasMany(ShippingAddress::class, 'order_details_id');
    }

    public function billingdetails()
    {
        return $this->hasMany(BillingDetails::class, 'order_details_id');
    }

    public function merchant()
    {
        return $this->belongsTo(User::class, 'merchant_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
