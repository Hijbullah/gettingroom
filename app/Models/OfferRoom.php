<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferRoom extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * Get the user that owns the listing.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
