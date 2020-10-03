<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function index(){
        $products = Product::where('status',1)->get();
        $users = User::get();
        $bills = Bills::where('status',1)->get();
        return view('admin.index',compact('products','users','bills'));
    }
}
