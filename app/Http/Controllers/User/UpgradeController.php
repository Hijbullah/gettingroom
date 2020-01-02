<?php

namespace App\Http\Controllers\User;

use Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpgradeController extends Controller
{
    public function showPlans()
    {
        // $plans = Stripe::plans()->all();
        // $plans = json_encode($plans['data']);
        return view('users.upgrades.plan');
    }

    public function paymentForm($planId)
    {
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
            'plan' => $plan
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
                $user->newSubscription('default', 313)
                ->trialDays(1)
                ->create($paymentMethod, [
                    'name' => $request->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => $request->address
                ]);
                
            } catch (\Stripe\Exception\CardException $e) {
                return response()->json($e);
            }

            return response()->json($planId);
        }else{
             try {
                 $user->newSubscription('default', $planId)
                     ->create($paymentMethod, [
                         'name' => $request->name,
                         'email' => $user->email,
                         'phone' => $user->phone,
                         'address' => $request->address
                     ]);
            } catch (\Stripe\Exception\CardException $e) {
                return response()->json($e);
            }


            return response()->json($planId);
        }
        
    }
}
