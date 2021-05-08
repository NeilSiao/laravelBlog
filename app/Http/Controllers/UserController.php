<?php

namespace App\Http\Controllers;

use App\Service\CloudinaryService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __constrcut(CloudinaryService $cloudService)
    {
        $this->middleware('auth');
        $this->cloudService = $cloudService;
    }

    //
    public function userProfile(Request $requset)
    {
        $user = Auth::user();
        return view('user.userProfileEdit')->with(array('user' => $user));
    }

    public function userUpdate(Request $request, CloudinaryService $cloudService)
    {
        $user = Auth::user();
        $user = User::findorFail($user->id);

        $user->name      = $request->input('name');
        $user->user_desc = $request->input('user_desc');
        $user->byword    = $request->input('byword');

        if ($request->hasfile('image')) {
            $image = $request->file('image');

            try {
                $data = $cloudService->saveImgToCloud($image);
            } catch (\Throwable $th) {
                \Log::error("upload images Failed: " . $th);
            }

            $user->user_img = $data['secure_url'];
        }
        $user->save();

        return redirect('/dashboard');
    }

    public function show($user_id)
    {
        $user = User::findorFail($user_id);

        return view('user.userProfileShow')->with(['user' => $user]);
    }
}
