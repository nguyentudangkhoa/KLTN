<?php

namespace App\Http\Controllers;

use App\Discount_info;
use App\Group_type;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_type;
use Illuminate\Http\Request;

class SortPriceController extends Controller
{
    public function SortPrice(Request $req){
        if($req->price == 1){
            $product_arrays = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.status', 1)
            ->where('product.price','<=',10000)
            ->where('product.price','>=',0)
            ->orderBy('product.created_at', 'DESC')
            ->orderBy('discount_info.end_at', 'DESC')
            ->paginate(9);
        }else if($req->price == 2){
            $product_arrays = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.status', 1)
            ->where('product.price','<=',20000)
            ->where('product.price','>=',11000)
            ->orderBy('product.created_at', 'DESC')
            ->orderBy('discount_info.end_at', 'DESC')
            ->paginate(9);
        }else if($req->price == 3){
            $product_arrays = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.status', 1)
            ->where('product.price','<=',30000)
            ->where('product.price','>=',21000)
            ->orderBy('product.created_at', 'DESC')
            ->orderBy('discount_info.end_at', 'DESC')
            ->paginate(9);
        }else if($req->price == 4){
            $product_arrays = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.status', 1)
            ->where('product.price','<=',50000)
            ->where('product.price','>=',31000)
            ->orderBy('product.created_at', 'DESC')
            ->orderBy('discount_info.end_at', 'DESC')
            ->paginate(9);
        }else if($req->price == 5){
            $product_arrays = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.status', 1)
            ->where('product.price','>',51000)
            ->orderBy('product.created_at', 'DESC')
            ->orderBy('discount_info.end_at', 'DESC')
            ->paginate(9);
        }

        //Show discount products to index
        $product_discounts = Discount_info::take(10)->get();
        return view('product.product', compact('product_arrays', 'product_discounts'));
    }
}
