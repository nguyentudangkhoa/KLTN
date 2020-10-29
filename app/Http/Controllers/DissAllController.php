<?php

namespace App\Http\Controllers;

use App\Group_type;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_type;
use App\Unit;
use Illuminate\Http\Request;

class DissAllController extends Controller
{
    public function dissAll(Request $req)
    {
        $table = $req->table;
        $id = $req->id;
        if ($table == 'Product') {
            $product = Product::find($id);
            if ($product->status == 2) {
                return response()->json(['report' => 'Đã có lỗi trong quá trình vô hiệu hóa']);
            } else {
                Product::where('id', $id)->update(['status' => 2]);
                return response()->json(['success' => 'Vô hiệu hóa thành công']);
            }
        }else if ($table == 'Product_type') {
            $category = Product_type::find($id);
            if ($category->status == 2) {
                return response()->json(['report' => 'Đã có lỗi trong quá trình vô hiệu hóa']);
            } else {
                Product_type::where('id', $id)->update(['status' => 2]);
                return response()->json(['success' => 'Vô hiệu hóa thành công']);
            }
        }else if ($table == 'Group_type') {
            $category = Group_type::find($id);
            if ($category->status == 2) {
                return response()->json(['report' => 'Đã có lỗi trong quá trình vô hiệu hóa']);
            } else {
                Group_type::where('id', $id)->update(['status' => 2]);
                return response()->json(['success' => 'Vô hiệu hóa thành công']);
            }
        } else if ($table == 'Unit') {
            $unit = Unit::find($id);
            if ($unit->status == 2) {
                return response()->json(['report' => 'Đã có lỗi trong quá trình vô hiệu hóa']);
            } else {
                Unit::where('id', $id)->update(['status' => 2]);
                return response()->json(['success' => 'Vô hiệu hóa thành công']);
            }
        }
    }
}
