<?php

namespace App\Http\Controllers;

use App\User;
use Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __constrcut(){
        $this->middleware('auth');
    }
    //
    public function userProfile(Request $requset){
        $user = Auth::user();
        return view('user.userProfileEdit')->with(array('user' => $user));
    }
    
    public function userUpdate(Request $request){
        $user = Auth::user();
        $user =User::findorFail($user->id);

        $user->name = $request->input('name');
        $user->user_desc = $request->input('user_desc');
        $user->byword = $request->input('byword');

        if($request->hasfile('image')){
            $image = $request->file('image');
            $path = $image->getRealPath();
            \Cloudinary::config(array(
                "cloud_name" => "dzjdn589g",
                "api_key" => "913728663371981",
                "api_secret" => "YdkY6SmwMXswvXpgjfjG9dCik6A"
            ));
            
             $data = \Cloudinary\Uploader::upload($path, array(
                 "folder" => "posts_img/",
                )); 
            $user->user_img = $data['secure_url'];
        }
        $user->save();
        
        return redirect('/dashboard');
    }

    public function show($user_id){
        $user = User::findorFail($user_id);
        
        return view('user.userProfileShow')->with(['user' => $user]);
    }
}
