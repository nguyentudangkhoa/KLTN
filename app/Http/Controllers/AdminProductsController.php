<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Product_type;
use App\Unit;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    public function ShowProduct(Request $req){
        $products = Product::get();
        $units = Unit::get();
        $productTypes = Product_type::get();
        return view('admin.table.products',compact('products','units','productTypes'));
    }
}
