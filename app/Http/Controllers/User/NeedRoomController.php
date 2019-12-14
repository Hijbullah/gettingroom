<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\NeedRoom;
use Illuminate\Http\Request;

class NeedRoomController extends Controller
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
       return view('users.needrooms.create');
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
            'location'              => 'required|string',
            'lat'                   => 'required',
            'lng'                   => 'required',
            'rental_currency'       => 'required',
            'monthly_rent'          => 'required|numeric',
            'is_short_term'         => 'required|boolean',
            'move_date'             => 'required|date',
            'leave_date'            => 'nullable|date',
            'description'           => 'required|string|min:20',

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

            'my_pet'       => 'nullable|array',
            'prefer_pet'           => 'nullable|array'
            
        ]);

        $listing_id = 21 . $this->getListingId();

        $needRoom = new NeedRoom;
        $needRoom->listing_id = $listing_id;
        $needRoom->user_id = $request->user()->id;
        $needRoom->title = $request->title ? $request->title : 'New Listing';                
        $needRoom->location = $request->location;           
        $needRoom->lat = $request->lat;                
        $needRoom->lng = $request->lng;   
        $needRoom->rental_currency = $request->rental_currency;      
        $needRoom->monthly_rent = $request->monthly_rent;         
        $needRoom->is_short_term = $request->is_short_term;        
        $needRoom->move_date = $request->move_date;            
        $needRoom->leave_date = $request->leave_date;        
        $needRoom->description = $request->description; 

        $needRoom->cleanliness = $request->cleanliness;          
        $needRoom->overnight_guest = $request->overnight_guest;     
        $needRoom->party_habit = $request->party_habit;         
        $needRoom->get_up = $request->get_up;               
        $needRoom->go_to_bed = $request->go_to_bed;            
        $needRoom->food_preference = $request->food_preference;      
        $needRoom->smoker = $request->smoker;               
        $needRoom->work_schedule = $request->work_schedule;        
        $needRoom->occupation = $request->occupation;           
        $needRoom->prefer_age = implode(',', $request->prefer_age);           
        $needRoom->prefer_smoker = $request->prefer_smoker;        
        $needRoom->prefer_student = $request->prefer_student;       
        $needRoom->my_pet = $request->my_pet ? implode(',', $request->my_pet) : null;      
        $needRoom->prefer_pet = $request->prefer_pet ? implode(',', $request->prefer_pet) : null;            
   
        $listing = $needRoom->save();

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
     * @param  \App\Models\NeedRoom  $needRoom
     * @return \Illuminate\Http\Response
     */
    public function show(NeedRoom $needRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NeedRoom  $needRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(NeedRoom $needRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NeedRoom  $needRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NeedRoom $needRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NeedRoom  $needRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(NeedRoom $needRoom)
    {
        //
    }
}
