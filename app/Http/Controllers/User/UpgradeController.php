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

    public function paymentForm($plan)
    {
        $user = Auth::user();
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
        $user->newSubscription('default', $planId)
            ->trialDays(1)
            ->create($paymentMethod);
        return 'done';
    }
}
