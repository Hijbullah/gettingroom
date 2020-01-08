<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getListingId()
    {
        return DB::table('utilities')->where('type', 'listing_id')->value('value');
    }

    public function increamentListingId()
    {
        DB::table('utilities')->where('type', 'listing_id')->increment('value');
        return true;
    }

    public function deleteImages($images)
    {
        $images->each(function($image){
            // $arrayPath = explode('/', $image);
            // array_splice($arrayPath, 0, 4);
            // $url = implode('/', $arrayPath);
            Storage::delete($image);
        });
        return true;
    }

}
