<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserImageController extends Controller
{
    public function getImage()
    {

        // $user = Auth::user();


        // if ($user && $user->image) {

        //     return response()->json(['image' => asset($user->image)]);
        // }


        // return response()->json(['image' => asset('images/default.png')]);
    }
}
