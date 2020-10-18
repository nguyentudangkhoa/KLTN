<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use App\Http\Controllers\Controller;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function ShowUser(){
        $users = User::get();
        $roles = Roles::get();

        return view('admin.table.user',compact('users','roles'));
    }
}
