<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Product_type;
use Illuminate\Http\Request;

class UpdateCategoryController extends Controller
{
    public function UpdateCategory(Request $req){
        $id = $req->id;
        $name = $req->name;
        $root = $req->root;
        $productType = Product_type::find($req->id);
        if($productType){
            if($name == ""){
                return response()->json(['report'=>'Tên danh mục không được để trống']);
            }else if($root == null){
                Product_type::where('id',$id)->update(['name'=>$name]);
                return response()->json(['success'=>"Cập nhật $productType->name thành công"]);
            }else {
                Product_type::where('id',$id)->update(['name'=>$name]);
                return response()->json(['success'=>"Cập nhật $productType->name thành công"]);
            }
        }
    }
}
