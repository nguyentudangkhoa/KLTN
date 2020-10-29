<?php

namespace App\Http\Controllers;

use App\Group_type;
use App\Http\Controllers\Controller;
use App\Product_type;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function ShowCategory(Request $req){
        $categories = Product_type::get();
        $group_cagories = Group_type::get();
        return view('admin.table.category',compact('categories','group_cagories'));
    }
}
