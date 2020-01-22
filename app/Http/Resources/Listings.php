<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
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
            'title' => Str::limit($this->title, 20),
            'move_date' => $this->move_date,
            'created_at' => $this->created_at->diffForHumans(),
            'listing_url' => url('/listings/' . $this->listing_id),
            $this->mergeWhen((int) substr($this->listing_id, 0, 2) == 22 || (int) substr($this->listing_id, 0, 2) == 32,[
                'image' => $this->images ? Storage::url(explode( ',', $this->images)[0]) : '/no-image.png',
            ]),
            $this->mergeWhen((int) substr($this->listing_id, 0, 2) == 21 || (int) substr($this->listing_id, 0, 2) == 31,[
                'image' => $this->user->avatar ? Storage::url($this->user->avatar) : '/frontend/images/user-defult.png',
            ]),
            'rent' => [
                'rent' => round($this->monthly_rent),
                'currency' => $this->rental_currency
            ],
            'location' => [
                'location' => Str::limit($this->location, 30),
                'lat' => $this->lat,
                'lng' => $this->lng
            ],
            'user' => [
                'name' => $this->user->first_name . ' ' . $this->user->last_name,
                'age' => $this->user->dob ? Carbon::parse($this->user->dob)->diffInYears(Carbon::now()) : null,
                'avatar' => $this->user->avatar ? Storage::url($this->user->avatar) : '/frontend/images/user-defult.png',
                'profile' => url('profile/' . $this->user->id),
                'verified' => [
                    'facebook' => $this->user->facebook_verified,
                    'twitter' => $this->user->twitter_verified,
                    'instagram' => $this->user->instagram_verified,
                    'linkedin' => $this->user->linkedin_verified,
                    'phone' => $this->user->phone_verified,
                ]
            ],
        ];
    }
}
