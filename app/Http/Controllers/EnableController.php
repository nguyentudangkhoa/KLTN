<?php

namespace App\Http\Controllers;

use App\Group_type;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_type;
use App\User;
use Illuminate\Http\Request;

class EnableController extends Controller
{
    //enable product
    public function EnableProduct(Request $req){
        $id = $req->id;
        Product::where('id',$id)->update(['status' => 1]);
        return response()->json(['success'=>'Kích hoạt thành công']);
    }
    //enable category
    public function EnableCategory(Request $req){
        $id = $req->id;
        Product_type::where('id',$id)->update(['status' => 1]);
        return response()->json(['success'=>'Kích hoạt thành công']);
    }
    //Enable Root
    public function EnableRoot(Request $req){
        $id = $req->id;
        Group_type::where('id',$id)->update(['status' => 1]);
        return response()->json(['success'=>'Kích hoạt thành công']);
    }
    //Enable user
    public function EnableUser(Request $req){
        $id = $req->id;
        User::where('id',$id)->update(['status' => 1]);
        return response()->json(['success'=>'Kích hoạt thành công']);
    }
}
