<?php

namespace App;

use Laravel\Cashier\Billable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'dob', 'phone', 'email', 'password', 'country', 'city', 'place', 'language', 'about',
    ];

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


    public function identities() 
    {
        return $this->hasMany('App\SocialIdentity');
    }

    /**
     * Get the Listings that owns the User.
     */
    public function needrooms()
    {
        return $this->hasMany('App\Models\NeedRoom', 'user_id');
    }
    /**
     * Get the Listings that owns the User.
     */
    public function offerrooms()
    {
        return $this->hasMany('App\Models\OfferRoom', 'user_id');
    }
    /**
     * Get the Listings that owns the User.
     */
    public function needapartments()
    {
        return $this->hasMany('App\Models\NeedApartment', 'user_id');
    }
    /**
     * Get the Listings that owns the User.
     */
    public function offerapartments()
    {
        return $this->hasMany('App\Models\OfferApartment', 'user_id');
    }
}
