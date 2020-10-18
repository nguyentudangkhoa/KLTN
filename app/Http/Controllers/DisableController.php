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
    public function Disable(Request $req){
        Product::where('id',$req->id)->update(['status'=>0]);
        return response()->json(['success'=>'Vô hiệu hóa thành công']);
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableType(Request $req){
        Product_type::where('id',$req->id)->update(['status'=>0]);
        return response()->json(['success'=>'Vô hiệu hóa thành công']);
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableGroup(Request $req){
        Group_type::where('id',$req->id)->update(['status'=>0]);
        return response()->json(['success'=>'Vô hiệu hóa thành công']);
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableUser(Request $req){
        User::where('id',$req->id)->update(['status'=>0]);
        return response()->json(['success'=>'Vô hiệu hóa thành công']);
    }

    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function DisableUnit(Request $req){
        $units = Unit::find($req->id);
        Unit::where('id',$req->id)->update(['status'=>0]);
        foreach($units as $unit){
            Product::where('id_unit',$unit->id)->update(['unit'=>""]);
        }
        return response()->json(['success'=>'Vô hiệu hóa thành công']);
    }
}
