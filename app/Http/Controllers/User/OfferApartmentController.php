<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OfferApartment;
use Illuminate\Http\Request;

class OfferApartmentController extends Controller
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
        return view('users.offerapartments.create');
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
            'minimum_stay'          => 'nullable',
            'description'           => 'required|string|min:20',
            'bedroom'               => 'nullable|string',
            'bathroom'              => 'nullable|string',
            'measurement'           => 'nullable|numeric',
            'measurement_unit'      => 'nullable|string',
            'is_furnished'          => 'nullable|string',
            'amenities'             => 'nullable|array',
            'images'                => 'nullable|array'
            
        ]);
        $listing_id = 32 . $this->getListingId();
        
        $offerApartment = new OfferApartment;
        $offerApartment->listing_id = $listing_id;
        $offerApartment->user_id = $request->user()->id;
        $offerApartment->title = $request->title ? $request->title : 'New Listing';                
        $offerApartment->location = $request->location;           
        $offerApartment->lat = $request->lat;                
        $offerApartment->lng = $request->lng;  
        $offerApartment->rental_currency = $request->rental_currency;      
        $offerApartment->monthly_rent = $request->monthly_rent;         
        $offerApartment->is_short_term = $request->is_short_term;        
        $offerApartment->move_date = $request->move_date;            
        $offerApartment->leave_date = $request->leave_date;           
        $offerApartment->minimum_stay = $request->minimum_stay;         
        $offerApartment->description = $request->description;          
        $offerApartment->bedroom = $request->bedroom;        
        $offerApartment->bathroom = $request->bathroom;          
        $offerApartment->measurement = $request->measurement;       
        $offerApartment->measurement_unit = $request->measurement_unit;         
        $offerApartment->is_furnished = $request->is_furnished;         
        $offerApartment->amenities = $request->amenities ? implode(',', $request->amenities) : null;                    
        $offerApartment->images = $request->images? implode(',' , $request->images) : null;               

        $listing = $offerApartment->save();

         
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
     * @param  \App\Models\OfferApartment  $offerApartment
     * @return \Illuminate\Http\Response
     */
    public function show(OfferApartment $offerApartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfferApartment  $offerApartment
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferApartment $offerApartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfferApartment  $offerApartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferApartment $offerApartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfferApartment  $offerApartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferApartment $offerApartment)
    {
        //
    }
}
