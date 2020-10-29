<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use App\Bills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBillController extends Controller
{
    public function ShowBill(){
        $bills = Bills::get();
        $billDetail = Bill_detail::get();
        return view('admin.table.bill',compact('bills','billDetail'));
    }
    public function ShowBillDetails(Request $req){
        $bills = Bills::find($req->id);
        $billDetail = Bill_detail::where('id_bill',$req->id)->get();
        return view('admin.table.bill_detail',compact('bills','billDetail'));
    }
    public function ShowSoleProduct(Request $req){
        $billDetail = Bill_detail::get();
        return view('admin.table.sole-product',compact('billDetail'));
    }
}
