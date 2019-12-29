<?php

namespace App\Http\Controllers\User;

use Twilio\Rest\Client;
use App\Models\Verification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailVerificationCode;

class VerificationController extends Controller
{
    public function sendEmailCode($id)
    {  
        $user = Auth::user(); 
        $code = rand(1000, 9999); 

        Verification::create([
            'user_id' => $user->id,
            'code' => $code,
            'type' => 'email'
        ]);

        $user->notify(new SendEmailVerificationCode($code));
        
        return 'done';
        
    }
    public function sendSmsCode($id, $phone)
    {  
        $user = Auth::user(); 
        if(!$user->phone)
        {
            $user->phone = $phone;
            $user->save();
        }
        $code = rand(1000, 9999); 

        Verification::create([
            'user_id' => $user->id,
            'code' => $code,
            'type' => 'phone'
        ]);

        $this->sendSms($code, $phone);
        
        return 'done';
    }

    public function verifyEmailCode($code)
    {
        $user = Auth::user();

        $verification = Verification::where([
            'user_id'=> $user->id,
            'type' => 'email'
        ])
        ->latest()
        ->first();

        
        if($code == $verification->code)
        {
            $user->email_verified = 1;
            $user->save();
            // $verification->delete();
            $this->clearCode('email');
            return 'done';
        }

       return 'no';
    }
    public function verifySmsCode($code)
    {
        $user = Auth::user();

        $verification = Verification::where([
            'user_id' => $user->id,
            'type' => 'phone'
        ])
        ->latest()
        ->first();

        
        if($code == $verification->code)
        {
            $user->phone_verified = 1;
            $user->save();
            $this->clearCode('phone');
            return 'done';
        }
       return 'no';
    }

    public function clearCode($type)
    {
        Verification::where([
            'user_id' => Auth::id(),
            'type' => $type
        ])
        ->delete();
    }

    /**
     * Sends sms to user using Twilio's programmable sms client
     * @param String $message Body of sms
     * @param Number $recipients Number of recipient
     */
   public function sendSms($code, $number)
    {
        $accountSid = config('services.twilio.TWILIO_ACCOUNT_SID');
        $authToken  = config('services.twilio.TWILIO_AUTH_TOKEN');
        $client = new Client($accountSid, $authToken);

        try
        {
            $client->messages->create(
                $number,
                array(
                        'from' => '+18557825986',
                        'body' => 'Your GettingRoom verification code is: ' . $code
                    )
            );
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

}
