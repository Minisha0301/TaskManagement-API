<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function sendOtp(Request $request)
    {
        $otp = 1234;

        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('OTP Verification');
        });

        return response()->json(['message' => 'OTP sent']);
    }


    public function verifyOtp(Request $request)
    {
        if ($request->otp == 1234) {
            return response()->json(['message' => 'Login success']);
        }

        return response()->json(['message' => 'Invalid OTP'], 401);
    }
}
