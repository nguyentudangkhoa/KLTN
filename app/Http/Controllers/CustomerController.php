<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function Customer(){
        $customers = Customer::get();
        return view('admin.table.customer',compact('customers'));
    }
}
