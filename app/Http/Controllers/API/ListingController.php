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
    public function getListings($type, $sortBy = null, $min, $max, $lat = null, $lng = null, $distance = 35)
    {
        $model = 'App\Models\\' . Str::studly($type);
        $data = $model::with('user')
            ->when($lat, function($query, $lat) use ($lng, $distance){
                return $query->whereRaw("(6371 * acos( cos( radians( $lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng ) ) + sin( radians( $lat) ) * sin( radians( lat ) ) ) ) < $distance");
            })
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
            ->whereBetween('monthly_rent', [$min, $max])
            ->latest()
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