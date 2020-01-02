<?php

namespace App\Http\Controllers\User;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupportController extends Controller
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

    public function showSupport()
    {
        $userId = Auth::id();
        Support::where('user_id', $userId)->update(['read' => 1]);
        $messages = Support::where('user_id', $userId)->latest()->get();
        
        return view('users.support', compact('messages'));
    }

    public function storeSupport(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        Support::create([
            'user_id'=> Auth::id(),
            'subject'=> $request->subject,
            'message'=> $request->message
        ]);
        return redirect()->to('/support')->with('status', 'Message has been sent!');
    }
}
