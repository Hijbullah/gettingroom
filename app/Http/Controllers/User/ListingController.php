<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{

    public function showAllListings(Request $request, $type)
    {
        if($request->query('loc')){
            $location = array(
                'location' => $request->query('loc'),
                'lat' => $request->query('lat'),
                'lng' => $request->query('lng')
            );
            $request->session()->put('location', $location);
        }


        $typeArray = ['needrooms', 'offerrooms', 'needapartments', 'offerapartments'];
        
        if(in_array($type, $typeArray))
        {
           switch ($type) {
                case 'needrooms':
                    $type = 'need_room';
                    break;
                case 'offerrooms':
                     $type = 'offer_room';
                    break;
                case 'offerapartments':
                    $type = 'offer_apartment';
                    break;
                default:
                    $type = 'need_apartment';
            }
            return view('users.listings.listing', compact('type'));
        }else{
            return abort(404);
        }
        
    }

    public function showSingleListing($listing_id)
    {
        $twoDigit = (int) substr($listing_id, 0, 2);
        switch ($twoDigit) {
            case 21:
                $type = 'NeedRoom';
                break;
            case 22:
                    $type = 'OfferRoom';
                break;
            case 31:
                $type = 'NeedApartment';
                break;
            default:
                $type = 'OfferApartment';
        }
        $model = 'App\Models\\' . $type;
        $title = $model::where('listing_id', $listing_id)->first('title');
        return view('users.listings.single', compact('type', 'listing_id', 'title'));
    }

    public function clearSearch()
    {
        if(session()->has('location')){
            session()->forget('location');
        }

    }

   

            
}
