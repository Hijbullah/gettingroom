<?php

namespace App\Http\Controllers\User;

use App\Models\OfferRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OfferRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.offerrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'                 => 'nullable|string|max:255',
            'location'              => 'nullable|string',
            'lat'                   => 'nullable',
            'lng'                   => 'nullable',
            'rental_currency'       => 'required',
            'monthly_rent'          => 'required|numeric',
            'is_short_term'         => 'required|boolean',
            'move_date'             => 'required|date',
            'leave_date'            => 'nullable|date',
            'minimum_stay'          => 'nullable',
            'description'           => 'required|string|min:20',

            'building_type'         => 'nullable|string',
            'move_in_fee'           => 'nullable|numeric',
            'utility_cost'        => 'nullable|numeric',
            'parking_rent'          => 'nullable|numeric',
            'is_furnished'          => 'nullable|string',

            'amenities'             =>'nullable|array',

            'household_age'         => 'required|array',

            'people_in_household'   => 'nullable|numeric',
            'household_sex'         => 'nullable|string',

            'cleanliness'           => 'nullable|string',
            'overnight_guest'      => 'nullable|string',
            'party_habit'          => 'nullable|string',
            'get_up'                => 'nullable|string',
            'go_to_bed'             => 'nullable|string',
            'food_preference'       => 'nullable|string',
            'smoker'                => 'nullable|string',
            'work_schedule'         => 'nullable|string',
            'occupation'            => 'nullable|string',

            'prefer_age'            => 'required|array',
            'prefer_smoker'         => 'nullable|string',
            'prefer_student'        => 'nullable|string',

            'hoursehold_pets'       => 'nullable|array',
            'prefer_pets'           => 'nullable|array',
            'images'                => 'nullable|array'
            
        ]);
        
        $listing_id = 22 . $this->getListingId();

        $offerRoom = new OfferRoom;
        $offerRoom->listing_id = $listing_id;
        $offerRoom->user_id = $request->user()->id;
        $offerRoom->title = $request->title ? $request->title : 'New Listing';           
        $offerRoom->location = $request->location;           
        $offerRoom->lat = $request->lat;                  
        $offerRoom->lng = $request->lng;                  
        $offerRoom->rental_currency = $request->rental_currency;      
        $offerRoom->monthly_rent = $request->monthly_rent;         
        $offerRoom->is_short_term = $request->is_short_term;        
        $offerRoom->move_date = $request->move_date;            
        $offerRoom->leave_date = $request->leave_date;           
        $offerRoom->minimum_stay = $request->minimum_stay;         
        $offerRoom->description = $request->description;          
        $offerRoom->building_type = $request->building_type;        
        $offerRoom->move_in_fee = $request->move_in_fee;          
        $offerRoom->utility_cost = $request->utility_cost;       
        $offerRoom->parking_rent = $request->parking_rent;         
        $offerRoom->is_furnished = $request->is_furnished;         
        $offerRoom->amenities = implode(',', $request->amenities);            
        $offerRoom->household_age = implode(',', $request->household_age);        
        $offerRoom->people_in_household = $request->people_in_household;  
        $offerRoom->household_sex = $request->household_sex;        
        $offerRoom->cleanliness = $request->cleanliness;          
        $offerRoom->overnight_guest = $request->overnight_guest;     
        $offerRoom->party_habit = $request->party_habit;         
        $offerRoom->get_up = $request->get_up;               
        $offerRoom->go_to_bed = $request->go_to_bed;            
        $offerRoom->food_preference = $request->food_preference;      
        $offerRoom->smoker = $request->smoker;               
        $offerRoom->work_schedule = $request->work_schedule;        
        $offerRoom->occupation = $request->occupation;           
        $offerRoom->prefer_age = implode(',', $request->prefer_age);           
        $offerRoom->prefer_smoker = $request->prefer_smoker;        
        $offerRoom->prefer_student = $request->prefer_student;       
        $offerRoom->household_pets = implode(',', $request->household_pets);      
        $offerRoom->prefer_pets = implode(',', $request->prefer_pets);          
        $offerRoom->images = implode(',' , $request->images);               
            
        $listing = $offerRoom->save();

        if($listing){
            $this->increamentListingId();
            return response()->json([
                'redirectUrl' => '/profile/' . Auth::user()->id
            ]);
        }else{
            return response()->json('something wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfferRoom  $offerRoom
     * @return \Illuminate\Http\Response
     */
    public function show(OfferRoom $offerroom)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfferRoom  $offerRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferRoom $offerroom)
    {
        return view('users.offerrooms.edit', compact('offerroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfferRoom  $offerRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferRoom $offerroom)
    {
        $request->validate([
            'title'                 => 'required|string|max:255',
            'location'              => 'required|string',
            'lat'                   => 'required',
            'lng'                   => 'required',
            'rental_currency'       => 'required',
            'monthly_rent'          => 'required|numeric',
            'is_short_term'         => 'required|boolean',
            'move_date'             => 'required|date',
            'leave_date'            => 'nullable|date',
            'minimum_stay'          => 'nullable',
            'description'           => 'required|string|min:20',

            'building_type'         => 'nullable|string',
            'move_in_fee'           => 'nullable|numeric',
            'utility_cost'        => 'nullable|numeric',
            'parking_rent'          => 'nullable|numeric',
            'is_furnished'          => 'nullable|string',

            'amenities'             =>'nullable|array',

            'household_age'         => 'required|array',

            'people_in_household'   => 'nullable|numeric',
            'household_sex'         => 'nullable|string',

            'cleanliness'           => 'nullable|string',
            'overnight_guest'      => 'nullable|string',
            'party_habit'          => 'nullable|string',
            'get_up'                => 'nullable|string',
            'go_to_bed'             => 'nullable|string',
            'food_preference'       => 'nullable|string',
            'smoker'                => 'nullable|string',
            'work_schedule'         => 'nullable|string',
            'occupation'            => 'nullable|string',

            'prefer_age'            => 'required|array',
            'prefer_smoker'         => 'nullable|string',
            'prefer_student'        => 'nullable|string',

            'hoursehold_pets'       => 'nullable|array',
            'prefer_pets'           => 'nullable|array',
            'images'                => 'nullable|array'
            
        ]);
        
        $offerroom->title = $request->title;           
        $offerroom->location = $request->location;           
        $offerroom->lat = $request->lat;                  
        $offerroom->lng = $request->lng;                  
        $offerroom->rental_currency = $request->rental_currency;      
        $offerroom->monthly_rent = $request->monthly_rent;         
        $offerroom->is_short_term = $request->is_short_term;        
        $offerroom->move_date = $request->move_date;            
        $offerroom->leave_date = $request->is_short_term ? $request->leave_date : null;           
        $offerroom->minimum_stay = $request->minimum_stay;         
        $offerroom->description = $request->description;          
        $offerroom->building_type = $request->building_type;        
        $offerroom->move_in_fee = $request->move_in_fee;          
        $offerroom->utility_cost = $request->utility_cost;       
        $offerroom->parking_rent = $request->parking_rent;         
        $offerroom->is_furnished = $request->is_furnished;         
        $offerroom->amenities = implode(',', $request->amenities);            
        $offerroom->household_age = implode(',', $request->household_age);        
        $offerroom->people_in_household = $request->people_in_household;  
        $offerroom->household_sex = $request->household_sex;        
        $offerroom->cleanliness = $request->cleanliness;          
        $offerroom->overnight_guest = $request->overnight_guest;     
        $offerroom->party_habit = $request->party_habit;         
        $offerroom->get_up = $request->get_up;               
        $offerroom->go_to_bed = $request->go_to_bed;            
        $offerroom->food_preference = $request->food_preference;      
        $offerroom->smoker = $request->smoker;               
        $offerroom->work_schedule = $request->work_schedule;        
        $offerroom->occupation = $request->occupation;           
        $offerroom->prefer_age = implode(',', $request->prefer_age);           
        $offerroom->prefer_smoker = $request->prefer_smoker;        
        $offerroom->prefer_student = $request->prefer_student;       
        $offerroom->household_pets = implode(',', $request->household_pets);      
        $offerroom->prefer_pets = implode(',', $request->prefer_pets);          
        $offerroom->images = implode(',' , $request->images);               
            
        $listing = $offerroom->save();
        
        return response()->json([
            'redirectUrl' => '/listings/' . $offerroom->listing_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfferRoom  $offerRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferRoom $offerroom)
    {
        $images = collect(explode(',', $offerroom->images));
        if($this->deleteImages($images))
        {
            $offerroom->delete();
            return response()->json('done');
        }
        
        return 'something wrong';
    }
}
