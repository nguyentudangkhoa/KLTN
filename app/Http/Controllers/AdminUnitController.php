<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;

class AdminUnitController extends Controller
{
    public function ShowUnit(){
        $units = Unit::get();
        return view('admin.table.unit',compact('units'));
    }
}
