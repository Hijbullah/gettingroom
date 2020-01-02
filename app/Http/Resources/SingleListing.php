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
                return $image;
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
            'listing_url' => url('/listings/' . $this->listing_id),
            'edit_url' => route(strtolower($this->type . 's.edit') ,$this->listing_id),
            'delete_url' => route(strtolower($this->type . 's.destroy') ,$this->listing_id),
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
                    'Building Type' => ucwords($this->building_type),
                    'Move in Fee' => $this->move_in_fee,
                    'Utility Cost' => $this->utility_cost,
                    'Parking Rent' => $this->parking_rent,
                    'Furnished' => ucwords($this->is_furnished)
                ],
                'household' => [
                    'Age' => implode(' to ', explode(',', $this->household_age)),
                    'People' => $this->people_in_household,
                    'Sex' => $this->household_sex
                ],
            ]),
            $this->mergeWhen($this->type == 'OfferApartment', [
                'residence' => [
                    'Bedroom' => ucwords($this->bedroom),
                    'Bathroom' => ucwords($this->bathroom),
                    'Measurement' => (int) $this->measurement . ' ' . $this->measurement_unit,
                    'Furnished' => ucwords($this->is_furnished)
                ],

            ]),
            $this->mergeWhen($this->type == 'NeedApartment', [
                'apartmentType' => $this->apartment_type
            ]),
            $this->mergeWhen(($this->type != 'NeedRoom' && $this->amenities), [
                'amenities' => explode(',', $this->amenities)
            ]),

            $this->mergeWhen(($this->type == 'OfferRoom' || $this->type == 'NeedRoom'), [
                'lifeStyle' => [
                    'Cleanliness' => $this->cleanliness,
                    'Overnight Guest' => $this->overnight_guest,
                    'Party Habit' => $this->party_habit,
                    'Get Up' => $this->get_up,
                    'Go to Bed' => $this->go_to_bed,
                    'Food Preference' => $this->food_preference,
                    'Smoker' => $this->smoker,
                    'Work Schedule' => $this->work_schedule,
                    'Occupation' => $this->occupation
                ],
                'roomMatePreference' => [
                    'Age Preference' => implode(' to ', explode(',' , $this->prefer_age)),
                    'Smoke Preference' => $this->prefer_smoker,
                    'Student Preference' => ucfirst($this->prefer_student)
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
                'avatar' => $this->user->avatar ? $this->user->avatar : '/frontend/images/user-defult.png'
            ],
            'created_at' => $this->created_at->diffForHumans(),
            
        ];
    } 
}
