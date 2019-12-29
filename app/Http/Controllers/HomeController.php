<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Image;

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

    public function editProfile($id)
    {
        $user = User::where('id', $id)
            ->first([
                'id', 
                'first_name', 
                'last_name', 
                'email', 
                'phone',
                'gender', 
                'dob',
                'avatar', 
                'language',  
                'city',
                'about'
            ]);
        return view('users.profile-edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'language' => 'required|string',
            'dob' => 'required|date',
            'city' => 'required|string',
            'phone' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|string|unique:users',
            'about' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $path = $file->hashName('avatar');
            $image = Image::make($file);
            $image->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put($path, (string) $image->encode());
    
            $path = Storage::url($path);
        }

        $user = User::findOrFail($id);
        $user->language = $request->language;
        $user->dob = $request->dob;
        $user->city = $request->city;
        if($request->email){
            $user->email = $request->email;
        }
        if($request->hasFile('avatar')){
            $user->avatar = $path;
        }
        if($request->phone){
            $user->phone = $request->phone;
        }
        $user->about = $request->about;
        $user->save();
        return redirect()->route('profile.show', $id)->with('status', 'Profile Updated Successfully');
    }

    public function getAuthUser()
    {
        $user = DB::table('users')
            ->select('id', 'email', 'phone', 'email_verified', 'phone_verified', 'fb_verified', 'google_verified', 'instagram_verified', 'linkedin_verified', 'twitter_verified')
            ->where('id', Auth::id())
            ->first();
        return response()->json($user);     
    }

}
