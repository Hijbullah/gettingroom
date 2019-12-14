<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| default namespace is "App\Http\Controllers"
|
*/

Route::get('/', 'HomeController@showLandingPage');

// auth and Social Auth
Auth::routes();

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');


// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'HomeController@showProfile');
Route::view('/listingNew', 'users.listings.listing-new')->middleware('auth');
Route::get('/lists/{type}', 'User\ListingController@showAllListings')->name('listings.all');
Route::get('/listings/{listing_id}', 'User\ListingController@showSingleListing')->where('listing_id', '[0-9]+');


//listings
Route::resource('/offerrooms','User\OfferRoomController')->middleware('auth');
Route::resource('/needrooms','User\NeedRoomController')->middleware('auth');
Route::resource('/offerapartments','User\OfferApartmentController')->middleware('auth');
Route::resource('/needapartments','User\NeedApartmentController')->middleware('auth');

// file uploads
Route::post('/fileUpload', 'User\FileUploadController@fileUpload');
Route::post('/fileEdit/{file}', 'User\FileUploadController@fileEdit')->where('file', '(.*)');;
Route::post('/fileDelete', 'User\FileUploadController@fileDelete');

// upgrade
Route::get('/upgrade/plans', 'User\UpgradeController@showPlans');
Route::get('/upgrade/plans/{plan}', 'User\UpgradeController@paymentForm');
Route::post('/upgrade/subscribed', 'User\UpgradeController@subscribed');
