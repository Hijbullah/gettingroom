<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the Subscription to the Stripe.
     *
     * @return \Illuminate\Http\Response
     */
    public function gettingSubscription()
    {
        $subscriptions = Subscription::with('user')->latest()->paginate(10);
        return view('admins.page.subscriptions.subscription', compact('subscriptions'));
    }
}
