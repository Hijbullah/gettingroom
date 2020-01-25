<?php

namespace App\Http\Controllers\User;

use Stripe;
use CountryState;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpgradeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPlans()
    {
        // $previous_url =  str_replace(url('/'), '', url()->previous());

        // if(Str::is('/listings*', $previous_url))
        // {
        //     session(['from_listing' => $previous_url]);
        //     return session('from_listing');
        // }
        

        if(Auth::user()->subscribed('default'))
        {
            return redirect('/setting');
        }
        
        return view('users.upgrades.plan');
    }

    public function paymentForm($planId)
    {
        $countries = CountryState::getCountries();
        $states = CountryState::getStates('US');
        
        $user = Auth::user();
        if($planId == 310){
            $plan = [
                'id' => 310,
                'nickname' => '1 days free',
                'amount' => 0.00,
                'currency' => 'usd' 
            ];
        }else{
            $plan = Stripe::plans()->find($planId);
        }

        return view('users.upgrades.payment', [
            'intent' => $user->createSetupIntent(),
            'plan' => $plan,
            'countries' => $countries,
            'states' => $states
        ]);
    }

    public function subscribed(Request $request)
    {

        $user = Auth::user();
        $planId = $request->planId;
        $paymentMethod = $request->payment_method;

        
        if($planId == 310)
        {
            try {
                $user->newSubscription('default', '313')
                ->trialDays(1)
                ->create($paymentMethod, [
                    'name' => $request->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => $request->address
                ]);
                return response()->json('success');
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }else{
            try {
                $user->newSubscription('default',$planId)
                ->create($paymentMethod, [
                    'name' => $request->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => $request->address
                ]);
                return response()->json('success');
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }
    }

    public function thank()
    {
        return view('users.upgrades.thank');
    }

    public function cancelSubscription()
    {
        Auth::user()->subscription('default')->cancel();
        return redirect()->to('/setting')->with('status', 'You have Cancelled your subscription successfully');
    }

}
