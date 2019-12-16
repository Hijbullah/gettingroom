<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class Listings extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'listing_id' => $this->listing_id,
            'title' => $this->title,
            'move_date' => $this->move_date,
            'created_at' => $this->created_at->diffForHumans(),
            'listing_url' => env('APP_URL') .'/listings/' . $this->listing_id,
            'image' => $this->images ? explode( ',', $this->images)[0] : env('APP_URL') . '/no-image.png',
            'rent' => [
                'rent' => $this->monthly_rent,
                'currency' => $this->rental_currency
            ],
            'location' => [
                'location' => $this->location,
                'lat' => $this->lat,
                'lng' => $this->lng
            ],
            'user' => [
                'name' => $this->user->first_name . ' ' . $this->user->last_name,
                'avatar' => env('APP_URL') . '/frontend/images/user-defult.png'
            ],
        ];
    }
}
