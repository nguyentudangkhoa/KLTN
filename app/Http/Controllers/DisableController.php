<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_type;
use App\Bills;
use App\Bill_detail;
use App\User;
use App\Unit;
use App\Group_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Undocumented class
 */
class DisableController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function Disable(Request $req)
    {
        $product = Product::find($req->id);
        if ($product->status == 0) {
            return response()->json(['report' => 'Đã có lỗi trong quá trình xóa sản phẩm']);
        } else {
            Product::where('id', $req->id)->update(['status' => 0]);
            return response()->json(['success' => 'Xóa sản phẩm thành công']);
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableType(Request $req)
    {
        $product_type = Product_type::find($req->id);
        if ($product_type->status == 0) {
            return response()->json(['report' => 'Đã có lỗi trong quá trình xóa danh mục']);
        } else {
            Product_type::where('id', $req->id)->update(['status' => 0]);
            return response()->json(['success' => 'Xóa danh mục thành công']);
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableGroup(Request $req)
    {
        $root = Group_type::find($req->id);
        if ($root->status == 0) {
            return response()->json(['report' => 'Đã có lỗi trong quá trình xóa danh mục tổng']);
        } else {
            Group_type::where('id', $req->id)->update(['status' => 0]);
            return response()->json(['success' => 'Xóa danh mục tổng thành công']);
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableUser(Request $req)
    {
        $user = User::find($req->id);
        if ($user->status == 0) {
            return response()->json(['report' => 'Đã có lỗi trong quá trình vô hiệu hóa user']);
        } else {
            User::where('id', $req->id)->update(['status' => 0]);
            return response()->json(['success' => 'Vô hiệu hóa thành công']);
        }
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableUnit(Request $req)
    {
        $units = Unit::find($req->id);
        if ($units->status == 0) {
            return response()->json(['success' => 'Đã có lỗi trong quá trình vô hiệu hóa user']);
        } else {
            Unit::where('id', $req->id)->update(['status' => 0]);
            return response()->json(['success' => 'Xóa đơn vị thành công']);
        }
        return response()->json(['success'=>'Xóa đơn vị thành công']);
    }
}
