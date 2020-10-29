<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteBillController extends Controller
{
    public function DeleteBill(Request $req){
        $id = $req->id;
        $bill = Bills::find($id);
        if($bill->status == 5){
            return response()->json(['report'=>'Đã có lỗi trong quá trình xóa hóa đơn vì hóa đơn ko tồn tại']);
        }else {
            Bills::where('id',$id)->update(['status'=>5]);
            return response()->json(['success'=>'Xóa hóa đơn thành công']);
        }
    }
}
