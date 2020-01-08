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
            'listing_url' => url('/listings/' . $this->listing_id),
            'edit_url' => route(strtolower($this->type . 's.edit') ,$this->listing_id),
            'delete_url' => route(strtolower($this->type . 's.destroy') ,$this->listing_id),
            'description' => $this->description,
            'images' => $this->when(($this->type == 'OfferRoom' || $this->type == 'OfferApartment'), $this->images ? $this->processImages($this->images) : null),

            'rent' => [
                'rent' => (int) $this->monthly_rent,
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
                    $this->mergeWhen($this->building_type,[
                        'Building Type' => ucwords($this->building_type)
                    ]),
                    $this->mergeWhen($this->move_in_fee,[
                        'Move in Fee' => $this->move_in_fee
                    ]),
                    $this->mergeWhen($this->utility_cost,[
                        'Utility Cost' => $this->utility_cost
                    ]),
                    $this->mergeWhen($this->parking_rent,[
                        'Parking Rent' => $this->parking_rent
                    ]),
                    'Furnished' => ucwords($this->is_furnished)
                ],
                'household' => [
                    'Age' => implode(' to ', explode(',', $this->household_age)),
                    $this->mergeWhen($this->people_in_household,[
                        'People' => $this->people_in_household
                    ]),
                    $this->mergeWhen($this->household_sex,[
                        'Sex' => $this->household_sex
                    ])
                ],
            ]),
            $this->mergeWhen($this->type == 'OfferApartment', [
                'residence' => [
                    $this->mergeWhen($this->bedroom,[
                        'Bedroom' => ucwords($this->bedroom)
                    ]),
                    $this->mergeWhen($this->bathroom,[
                        'Bathroom' => ucwords($this->bathroom)
                    ]),
                    $this->mergeWhen($this->measurement,[
                        'Measurement' => (int) $this->measurement . ' ' . $this->measurement_unit
                    ]),
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
                    $this->mergeWhen($this->cleanliness,[
                        'Cleanliness' => $this->cleanliness
                    ]),
                    $this->mergeWhen($this->overnight_guest,[
                        'Overnight Guest' => $this->overnight_guest
                    ]),
                    $this->mergeWhen($this->party_habit,[
                        'Party Habit' => $this->party_habit
                    ]),
                    $this->mergeWhen($this->get_up,[
                        'Get Up' => $this->get_up
                    ]),
                    $this->mergeWhen($this->go_to_bed,[
                        'Go to Bed' => $this->go_to_bed
                    ]),
                    $this->mergeWhen($this->food_preference,[
                        'Food Preference' => $this->food_preference
                    ]),
                    $this->mergeWhen($this->smoker,[
                        'Smoker' => $this->smoker
                    ]),
                    $this->mergeWhen($this->work_schedule,[
                        'Work Schedule' => $this->work_schedule
                    ]),
                    $this->mergeWhen($this->occupation,[
                        'Occupation' => $this->occupation
                    ])
                ],
                'roomMatePreference' => [
                    'Age Preference' => implode(' to ', explode(',' , $this->prefer_age)),
                    $this->mergeWhen($this->prefer_smoker,[
                        'Smoke Preference' => $this->prefer_smoker
                    ]),
                    $this->mergeWhen($this->prefer_student,[
                        'Student Preference' => ucfirst($this->prefer_student)
                    ])
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
                'avatar' => $this->user->avatar ? Storage::url($this->user->avatar) : '/frontend/images/user-defult.png',
                'phone' => $this->user->phone ? $this->user->phone : null,
                'verified' => [
                    'facebook' => $this->user->facebook_verified,
                    'twitter' => $this->user->twitter_verified,
                    'instagram' => $this->user->instagram_verified,
                    'linkedin' => $this->user->linkedin_verified,
                ]
            ],
            'created_at' => $this->created_at->diffForHumans(),
            
        ];
    } 
}
