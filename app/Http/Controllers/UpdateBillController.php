<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use App\Bills;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class UpdateBillController extends Controller
{
    public function UpdateBill(Request $req)
    {
        $id = $req->id;
        $status = $req->status;
        $bill = Bills::find($id);
        if ($bill->status == 0 || $bill->status == 4) {
            return response()->json(['report'=>'Đã có lỗi trong quá trình xác nhận đơn hàng']);
        } else {
            if ($status == null) {
                return response()->json(['report' => 'Bạn vui lòng chọn trạng thái.']);
            }else if ($status == 0 ){
                $billDetails = Bill_detail::where('id_bill', $bill->id)->get();
                foreach($billDetails as $detail){
                    $product = Product::where('id',$detail->id)->first();
                    $product->quantity += $detail->quantity;
                    $product->save();
                }
            } else {
                Bills::where('id', $id)->update(['status' => $status]);
                return response()->json(['success' => 'Cập nhật trang thái đơn hàng thành công.','status'=>$bill->status]);
            }
        }
    }
}
