<?php

namespace App\Http\Controllers;

use App\Group_type;
use App\Http\Controllers\Controller;
use App\Product_type;
use Illuminate\Http\Request;

class AddCategoryController extends Controller
{
    public function AddCategory(Request $req)
    {
        $name = $req->name;
        $root = $req->root;
        if ($name == "") {
            return response()->json(['report' => 'Tên danh mục không được để trống.']);
        } else if ($root == null) {
            return response()->json(['report' => 'Bạn vui lòng chọn danh mục tổng.']);
        }else {
            Product_type::create(['name'=>$name,'id_group_type'=>$root,'status'=>1]);
            return response()->json(['success'=>"Thêm danh mục $name thành công"]);
        }
    }
    public function AddRoot(Request $req)
    {
        $name = $req->name;
        if ($name == "") {
            return response()->json(['report' => 'Tên danh mục không được để trống.']);
        } else {
            Group_type::create(['name'=>$name]);
            $root = Group_type::find($req->name);
            return response()->json(['success'=>"Thêm danh mục $name thành công",'id'=>$root->id]);
        }
    }
}
