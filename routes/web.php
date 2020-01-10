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
Route::get('/get-auth-user', 'HomeController@getAuthUser');

// auth and Social Auth
Auth::routes();

Route::get('socialauth/{provider}', 'User\SocialAuthController@redirectToProvider');
Route::get('socialauth/{provider}/callback','User\SocialAuthController@handleProviderCallback');
Route::get('/social/{status}', function($status){
    return $status;
});



// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{id}', 'HomeController@showProfile')->name('profile.show');
Route::post('/profile/{id}', 'HomeController@updateProfile')->name('profile.update');
Route::get('/profile/{id}/edit', 'HomeController@editProfile')->name('profile.edit');



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
Route::get('/upgrade/thank', 'User\UpgradeController@thank');
Route::get('/upgrade/cancel', 'User\UpgradeController@cancelSubscription');

// verification
Route::get('/verification', 'User\VerificationController@showVerification');
Route::get('/verification/code/{user}/email', 'User\VerificationController@sendEmailCode');
Route::get('/verification/code/{user}/phone/{phone}', 'User\VerificationController@sendSmsCode');
Route::get('/verification/verify/{code}/email', 'User\VerificationController@verifyEmailCode');
Route::get('/verification/verify/{code}/phone', 'User\VerificationController@verifySmsCode');

Route::get('/clear/{type}', 'User\VerificationController@clearCode');
Route::get('sendsms', 'User\VerificationController@sendSms');



// messenger
Route::get('/message', 'User\MessengerController@showMessanger');
Route::get('/contacts', 'User\MessengerController@get');
Route::get('/conversation/{id}', 'User\MessengerController@getMessagesFor');
Route::post('/conversation/send', 'User\MessengerController@send');

// setting
Route::get('/setting', 'User\SettingController@showSetting');
Route::post('/setting/email', 'User\SettingController@changeEmail');
Route::post('/setting/password', 'User\SettingController@changePassword');

// support
Route::get('/support', 'User\SupportController@showSupport');
Route::post('/support', 'User\SupportController@storeSupport');

Route::view('/privacy', 'users.privacy');
Route::view('/terms', 'users.terms');