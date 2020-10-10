<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function ShowUser(){
        $users = User::get();
        return view('admin.table.user',compact('users'));
    }
}
