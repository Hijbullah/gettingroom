<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| default namespace is "App\Http\Controllers\Admin"
| default prefix: admin
|
*/

Route::redirect('/', '/admin/dashboard');
Route::view('/dashboard', 'admins.page.dashboard')->name('admin.dashboard')->middleware('auth:admin');
Route::view('/dummy', 'admins.page.dummy');
Route::view('/plans', 'admins.page.plans')->name('plan');

// Authentication Routes...
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admins.login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('admins.logout');

// Listings Routes

Route::get('/listings/needrooms', 'ListingController@gettingNeedRoom')->name('listings.needrooms');
Route::get('/listings/offerrooms', 'ListingController@gettingOfferRoom')->name('listings.offerrooms');
Route::get('/listings/needapartments', 'ListingController@gettingNeedApartment')->name('listings.needapartments');
Route::get('/listings/offerapartments', 'ListingController@gettingOfferApartment')->name('listings.offerapartments');

//Subscritions Routes
Route::get('/subscriptions', 'SubscriptionController@gettingSubscription')->name('subscriptions.all');

// Users Route
Route::get('users', 'UserController@gettingUser')->name('admin.users.all');

// Admins Routes
Route::get('/admins', 'AdminController@index')->name('admin.admins.all');



