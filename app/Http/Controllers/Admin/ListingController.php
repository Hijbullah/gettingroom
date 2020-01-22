<?php

namespace App\Http\Controllers\Admin;

use App\Models\NeedRoom;
use App\Models\OfferRoom;
use Illuminate\Http\Request;
use App\Models\NeedApartment;
use App\Models\OfferApartment;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    /**
     * Display a listing of the NeedRoom resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettingNeedRoom()
    {
        $needrooms = NeedRoom::with('user:id,first_name,last_name')
            ->latest()
            ->select('id', 'listing_id', 'user_id', 'title', 'monthly_rent', 'status')
            ->paginate(10);
        return view('admins.page.listings.needrooms', compact('needrooms'));
    }

    /**
     * Display a listing of the OfferRoom resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettingOfferRoom()
    {
        $offerrooms = OfferRoom::with('user:id,first_name,last_name')
            ->latest()
            ->select('id', 'listing_id', 'user_id', 'title', 'monthly_rent', 'status')
            ->paginate(10);
        return view('admins.page.listings.offerrooms', compact('offerrooms'));
    }

    /**
     * Display a listing of the NeedApartment resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettingNeedApartment()
    {
        $needapartments = NeedApartment::with('user:id,first_name,last_name')
            ->latest()
            ->select('id', 'listing_id', 'user_id', 'title', 'monthly_rent', 'status')
            ->paginate(10);
        return view('admins.page.listings.needapartments', compact('needapartments'));
    }

    /**
     * Display a listing of the OfferApartment resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettingOfferApartment()
    {
        $offerapartments = OfferApartment::with('user:id,first_name,last_name')
            ->latest()
            ->select('id', 'listing_id', 'user_id', 'title', 'monthly_rent', 'status')
            ->paginate(10);
        return view('admins.page.listings.offerapartments', compact('offerapartments'));
    }
}
