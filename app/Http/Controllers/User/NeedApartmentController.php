<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\NeedApartment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NeedApartmentController extends Controller
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
        return view('users.needapartments.create');
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
            'apartment_type'        => 'nullable|array',
            'is_furnished'          => 'nullable|string',
            'amenities'             => 'nullable|array',
            
        ]);
        $listing_id = 31 . $this->getListingId();

        $NeedApartment = new NeedApartment;
        $NeedApartment->listing_id = $listing_id;
        $NeedApartment->user_id = $request->user()->id;
        $NeedApartment->title = $request->title ? $request->title : 'New Listing';                
        $NeedApartment->location = $request->location;           
        $NeedApartment->lat = $request->lat;                
        $NeedApartment->lng = $request->lng;                 
        $NeedApartment->rental_currency = $request->rental_currency;      
        $NeedApartment->monthly_rent = $request->monthly_rent;         
        $NeedApartment->is_short_term = $request->is_short_term;        
        $NeedApartment->move_date = $request->move_date;            
        $NeedApartment->leave_date = $request->leave_date;       
        $NeedApartment->description = $request->description;  
        $NeedApartment->apartment_type = $request->apartment_type ? implode(',' , $request->apartment_type) : null;         
        $NeedApartment->is_furnished = $request->is_furnished;         
        $NeedApartment->amenities = $request->amenities ? implode(',', $request->amenities) : null;                    
                      

        $listing = $NeedApartment->save();

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
     * @param  \App\Models\NeedApartment  $needApartment
     * @return \Illuminate\Http\Response
     */
    public function show(NeedApartment $needapartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NeedApartment  $needapartment
     * @return \Illuminate\Http\Response
     */
    public function edit(NeedApartment $needapartment)
    {
        return view('users.needapartments.edit', compact('needapartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NeedApartment  $needApartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NeedApartment $needapartment)
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
            'description'           => 'required|string|min:20',
            'apartment_type'        => 'nullable|array',
            'is_furnished'          => 'nullable|string',
            'amenities'             => 'nullable|array',
            
        ]);
        
        $needapartment->title = $request->title;                
        $needapartment->location = $request->location;           
        $needapartment->lat = $request->lat;                
        $needapartment->lng = $request->lng;                 
        $needapartment->rental_currency = $request->rental_currency;      
        $needapartment->monthly_rent = $request->monthly_rent;         
        $needapartment->is_short_term = $request->is_short_term;        
        $needapartment->move_date = $request->move_date;            
        $needapartment->leave_date = $request->is_short_term ? $request->leave_date : null;       
        $needapartment->description = $request->description;  
        $needapartment->apartment_type = $request->apartment_type ? implode(',' , $request->apartment_type) : null;         
        $needapartment->is_furnished = $request->is_furnished;         
        $needapartment->amenities = $request->amenities ? implode(',', $request->amenities) : null;                    
                      

        $listing = $needapartment->save();

        return response()->json([
            'redirectUrl' => '/listings/' . $needapartment->listing_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NeedApartment  $needApartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(NeedApartment $needapartment)
    {
        $needapartment->delete();
        return response()->json('done');
    }
}
