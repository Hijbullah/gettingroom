<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleListing extends JsonResource
{

    protected $type;

    public function getType($value){
        $this->type = $value;
        return $this;
    }

    protected function processImages($images)
    {
        return collect(explode(',', $images))
            ->map(function ($image) {
                return Storage::url($image);
            });
    }

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
            'listing_url' => env('APP_URL') .'/listings/' . $this->listing_id,
            'description' => $this->description,
            'images' => $this->when(($this->type == 'OfferRoom' || $this->type == 'OfferApartment'), $this->images ? $this->processImages($this->images) : null),

            'rent' => [
                'rent' => $this->monthly_rent,
                'currency' => $this->rental_currency
            ],
            'location' => [
                'location' => $this->location,
                'lat' => $this->lat,
                'lng' => $this->lng
            ],
            'duration' => [
                'move_date' => $this->move_date,
                'leave_date' => $this->leave_date,
                'minimum_stay' => $this->minimum_stay
            ],

            $this->mergeWhen($this->type == 'OfferRoom', [
                'residence' => [
                    'building_type' => $this->building_type,
                    'move_in_fee' => $this->move_in_fee,
                    'utility_cost' => $this->utility_cost,
                    'parking_rent' => $this->parking_rent,
                    'is_furnished' => $this->is_furnished
                ],
                'household' => [
                    'age' => implode('-', explode(',', $this->household_age)),
                    'people' => $this->people_in_household,
                    'sex' => $this->household_sex
                ],
            ]),
            $this->mergeWhen($this->type == 'OfferApartment', [
                'residence' => [
                    'bedroom' => $this->bedroom,
                    'bathroom' => $this->bathroom,
                    'measurement' => $this->measurement,
                    'measurement_unit' => $this->measurement_unit,
                    'is_furnished' => $this->is_furnished
                ],

            ]),
            $this->mergeWhen($this->type == 'NeedApartment', [
                'apartmentType' => $this->apartment_type
            ]),
            $this->mergeWhen($this->type != 'NeedRoom', [
                'amenities' => explode(',', $this->amenities)
            ]),

            $this->mergeWhen(($this->type == 'OfferRoom' || $this->type == 'NeedRoom'), [
                'lifeStyle' => [
                    'cleanliness' => $this->cleanliness,
                    'overnight_guest' => $this->overnight_guest,
                    'party_habit' => $this->party_habit,
                    'get_up' => $this->get_up,
                    'go_to_bed' => $this->go_to_bed,
                    'food_preference' => $this->food_preference,
                    'smoker' => $this->smoker,
                    'work_schedule' => $this->work_schedule,
                    'occupation' => $this->occupation
                ],
                'roomMatePreference' => [
                    'prefer_age' => $this->prefer_age,
                    'prefer_smoker' => $this->prefer_smoker,
                    'prefer_student' => $this->prefer_student
                ],

                'pets' => [
                    'have' => $this->household_pets ? explode(',', $this->household_pets) : null,
                    'prefer' => $this->prefer_pets ? explode(',', $this->prefer_pets) : null,
                ],

            ]),
            
            
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->first_name . ' ' . $this->user->last_name,
                'age' => Carbon::parse($this->user->dob)->diffInyears(Carbon::now()),
                'profile_url' => '/profile/' . $this->user->id,
                'avatar' => env('APP_URL') . '/frontend/images/user-defult.png'
            ],
            'created_at' => $this->created_at->diffForHumans(),
            
        ];
    } 
}
