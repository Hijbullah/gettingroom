<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\Listings;
use App\Http\Controllers\Controller;
use App\Http\Resources\SingleListing as singleListingResource;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListings($type, $sortBy = null, $lat=null, $lng=null, $distance = 2)
    {
        $model = 'App\Models\\' . Str::studly($type);
        $data = $model::with('user')
            // ->whereRaw("(6371 * acos( cos( radians( $lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng ) ) + sin( radians( $lat) ) * sin( radians( lat ) ) ) ) < $distance")
            ->when($sortBy,function ($query,$sortBy){
                    if ($sortBy == 'latest'){
                        return $query->orderBy('id', 'asc');
                    }elseif($sortBy == 'activity'){
                        return $query->orderBy('id','desc');
                    }else{
                        return $query->orderBy('monthly_rent','asc');
                    }
                })
            
            ->paginate(15);
        
        return Listings::collection($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListing($type, $listing_id)
    {
        $model = 'App\Models\\' . $type;
        $data = $model::with('user')->where('listing_id', $listing_id)->first();
        
        if(!$data){
            return response()->json('error');
        }
        
        return (new singleListingResource($data))->getType($type);
    }
}