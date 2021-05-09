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
        if ($user == null) {
            return back();
        }

        return view('user.userProfileEdit')->with(array('user' => $user));
    }

    public function userUpdate(Request $request, CloudinaryService $cloudService)
    {
        $user = Auth::user();
        $user = User::findorFail($user->id);

        $user->name      = $request->input('name');
        $user->user_desc = $request->input('user_desc');
        $user->byword    = $request->input('byword');

        $validator = \Validator::make($request->all(), [
            'image' => 'max:6000|mimes:jpeg,png,jpg,gif,svg,bmp',
        ], $message = [
            'image.mimes' => 'File must be a image',
            'image.max'   => 'Uploaded File excceed 6M!',
        ]);
        if ($validator->fails()) {
            $errors = $validator->messages()->all();
            session()->flash('error', $errors);
            return back();
        }

        if ($request->hasfile('image')) {
            $image          = $request->file('image');
            $data           = $cloudService->saveImgToCloud($image);
            $user->user_img = $data['secure_url'];
        }
        $user->save();

        session()->flash('msg', 'Update Success');
        return redirect()->route('userProfile');
    }

    public function show($user_id)
    {
        $user = User::findorFail($user_id);

        return view('user.userProfileShow')->with(['user' => $user]);
    }
}
