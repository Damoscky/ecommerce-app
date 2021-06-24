<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function shippingaddress()
    {
        return $this->hasOne(ShippingAddress::class, 'order_id');
    }

    public function billingdetails()
    {
        return $this->hasMany(BillingDetails::class, 'order_id');
    }

    public function usershipping()
    {
        return $this->hasMany(UserShipping::class);
    }

    public function userbilling()
    {
        return $this->hasMany(UserBilling::class);
    }


    public function cancelorder()
    {
        return $this->hasMany(CancelOrder::class);
    }
}
