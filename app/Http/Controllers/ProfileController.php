<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class ProfileController extends Controller
{
    public function profile()
    {
        $data['user'] = Auth::user();
        return view('profile.profile', $data);
    }

    public function updateAvatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . $fileName));

            $user = Auth::user();
            $user->avatar = $fileName;
            $user->save();
        }

        return view('profile.profile', ['user' => Auth::user()]);
    }
}
