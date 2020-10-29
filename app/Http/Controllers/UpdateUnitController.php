<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Unit;
use Illuminate\Http\Request;

class UpdateUnitController extends Controller
{
    public function UpdateUnit(Request $req){
        $id = $req->id;
        $name = $req->name;
        if($name == ""){
            return response()->json(['report'=>'Tên đơn vị không được để trống.']);
        }else {
            Unit::where('id',$id)->update(['name'=>$name]);
            return response()->json(['success'=>'Cập nhật đơn vị thành công.']);
        }
    }
}
