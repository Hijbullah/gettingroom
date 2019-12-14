<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use App\SocialIdentity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            // return $e;
            return redirect('/login');
        }

        list($authUser, $location) = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
         return redirect()->intended($location);
    }
 
 
    public function findOrCreateUser($providerUser, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
                   ->whereProviderId($providerUser->getId())
                   ->first();
 
        if ($account) {
            return array($account->user, '/');
        } else {
            $user = User::whereEmail($providerUser->getEmail())->first();
 
            if (! $user) 
            {
                list($firstName, $lastName) = explode(' ', $providerUser->getName());
                $user = User::create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $providerUser->getEmail()
                ]);
            }
 
            $user->identities()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
            ]);
 
            return array($user, '/listingNew');
        }
    }
}
