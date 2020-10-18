<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class AdminPDFController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $req
     * @return void
     */
    public function PrintPDF(Request $req){
        $bill = Bills::where('status',1)->where('id',$req->id)->first();
        $pdf = PDF::loadView('admin.PDF.bill_pdf',compact('bill'));//not error
        return $pdf->download('Bill_'.strtoupper($bill->Customer->name).'.pdf');
    }
}
