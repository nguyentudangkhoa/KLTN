<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product_type;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function ShowCategory(Request $req){
        $categories = Product_type::get();
        return view('admin.table.category',compact('categories'));
    }
}
