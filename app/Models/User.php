<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    protected $with = ['roles', "company", "subscription"];

    /**
     * The guard for `laravel-permissions` to use.
     *
     * Patching `Spatie\Permission\Guard` because it's not picking up Laravel's default.
     *
     * @return string
     */
    public function guardName(): string
    {
        return 'web';
    }

    protected $guarded = ["id"];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function usershipping()
    {
        return $this->hasOne(UserShipping::class);
    }

    public function userbilling()
    {
        return $this->hasOne(UserBilling::class);
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
