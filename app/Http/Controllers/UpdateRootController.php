<?php

namespace App\Http\Controllers;

use App\Group_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateRootController extends Controller
{
    public function UpdateRootCate(Request $req){
        $id = $req->id;
        $name = $req->name;
        if($name == ""){
            return response()->json(['error'=>'Tên danh mục tổng không được để trống.']);
        }else {
            Group_type::where('id',$id)->update(['name'=>$name]);
            return response()->json(['success'=>" Cập nhật danh mục tổng thành công"]);
        }
    }
}
