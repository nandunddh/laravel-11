<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UpdateProfileimageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfileImageController extends Controller
{
    public function update(UpdateProfileimageRequest $request)
    {

        // dd($request->file('profile_image'));
        $request->file('profile_image')->store('profileimages');

        return Redirect::route('profile.edit');
    }
}
