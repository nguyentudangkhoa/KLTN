<?php

namespace App\Http\Controllers;

use App\Group_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRootCategoryController extends Controller
{
    public function ShowRootCategory(Request $req){
        $rootCategories = Group_type::where('status',1)->get();
        return view('admin.table.root-category',compact('rootCategories'));
    }
}
