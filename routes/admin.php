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

Route::get('/', 'HomeController@index');
Route::view('/dashboard', 'admins.page.dashboard');
Route::view('/dummy', 'admins.page.dummy');
Route::view('/plans', 'admins.page.plans')->name('plan');

// Authentication Routes...
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admins.login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('admins.logout');




