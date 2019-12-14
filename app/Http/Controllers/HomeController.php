<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     if (Auth::user()->onTrial('default')) {
    //         return 'you are on trial';
    //     }
    //     return view('home');
    // }

    public function showLandingPage()
    {
        if(Auth::check()){
            return redirect()->route('listings.all', 'needrooms');
        }

        return view('landing');
    }

    public function showProfile($id)
    {

        $user = User::with('identities:id,user_id,provider_name')->withCount('needrooms', 'offerrooms', 'needapartments', 'offerapartments')
            ->findOrFail($id);
        

        $listings = collect();    
        if ($user->needrooms_count > 0) {
            $listings = $listings->merge($user->needrooms);
        }
        if ($user->offerrooms_count > 0) {
            $listings = $listings->merge($user->offerrooms);
        }
        if ($user->needapartments_count > 0) {
            $listings = $listings->merge($user->needapartments);
        }
        if ($user->offerapartments_count > 0) {
            $listings = $listings->merge($user->offerapartments);
        }
        
        return view('users.profile', compact('user', 'listings'));
    }

}
