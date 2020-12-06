<?php

namespace App\Http\Controllers;

use App\Group_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteRootController extends Controller
{
    public function DelRoot(Request $req){
        $root = Group_type::find($req->id);
        if ($root->status == 2){
            return response()->json(['report'=>'Đã có lỗi trong quá trình xóa danh mục tổng']);
        }else {
            Group_type::where('id',$req->id)->update(['status' => 2]);
            return response()->json(['success'=>'Xóa danh mục tổng thành công']);
        }
    }
}
