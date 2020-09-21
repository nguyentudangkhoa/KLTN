<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function ShowProfile(Request $req){
        $user = User::find($req->id);
        //dd($user->User_Address );
        return view('profile.profile-user',compact('user'));
    }
}
