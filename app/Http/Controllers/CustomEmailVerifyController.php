<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CustomEmailVerifyController extends Controller
{
    //
    public function verifyUser(Request $request, $email_token){
        $user = User::where('email_token', '=', $email_token)->first();
        if(isset($user)){
            $user->email_verified_at = now();
            $user->save();
            return redirect('/home');
        }else{
            return 'verification failed';
            throw new Exception('找不到此用戶');
        }
    }
}
