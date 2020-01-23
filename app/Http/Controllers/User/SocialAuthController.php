<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Models\Support;
use App\SocialIdentity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        // if($provider == 'linkedin')
        // {
        //     return Socialite::driver($provider)
        //         ->redirect();
        // }
        return Socialite::driver($provider)
            ->redirect();
    }

     public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            // return response()->json($user);

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            if(Auth::check())
            {
                return redirect('/social/error');
            }
            return redirect('/login');
        }

        
        if(Auth::check())
        {
            $user = Auth::user();
            $field = $provider . '_verified';
            $user->$field = 1;
            $user->save();
            return redirect('/social/done');
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
            $field = $provider . '_verified';
            if (! $user) 
            {
                list($firstName, $lastName) = explode(' ', $providerUser->getName());
                $user = User::create([
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $providerUser->getEmail(),
                    $field => 1
                ]);

                Support::create([
                    'user_id'=> $user->id,
                    'admin'=>'admin',
                    'subject'=>'Welcome to GettingRoom!',
                    'message'=>'If you have any questions about your Gettingroom account, there is a site representative who is always available, and in most cases responds to you within minutes.'
                ]);
            }
 
            $user->identities()->create([
                'provider_id'   => $providerUser->getId(),
                'provider_name' => $provider,
            ]);
 
            return array($user, '/listingNew');
        }
    }
    public function socialStatus($status)
    {
        return $status;
    }

}
