<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;

class AddUnitController extends Controller
{
    public function AddUnit(Request $req){
        $name = $req->name;
        if($name == ""){
            return response()->json(['report'=>'Tên đơn vị không được để trống.']);
        }else {
            Unit::create(['name'=>$name]);
            return response()->json(['success'=>'Thêm đơn vị thành công.']);
        }
    }
}
