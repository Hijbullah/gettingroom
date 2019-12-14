<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//   return $request->user();
//});

Route::namespace('API')->group(function () {
    Route::get('/getUser/{id}', 'UserController@getUser');
    Route::post('/updateUser/{id}', 'UserController@updateUser');

    Route::get('/get-listings/{type}/{sort}/{lat?}/{lng?}', 'ListingController@getListings');
    Route::get('/get-listing/{type}/{listing_id}', 'ListingController@getListing');
});
