<?php

namespace App\Http\Controllers;

use App\Discount_info;
use App\Product;
use App\Product_type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Index page
    public function Index()
    {
        // Show nut product to index
        $nuts_id = Product_type::where('name', 'like', '%hạt%')->first();
        $product_nuts = Product::select('product.id','product.name','product.images','product.price','discount_info.promotion_price','discount_info.end_at','discount_info.status','product.created_at')
                        ->leftJoin('discount_info','discount_info.id_product','=','product.id')
                        ->where('product.id_type',$nuts_id->id)
                        ->where('product.status', 1)
                        ->orderBy('product.created_at', 'DESC')
                        ->orderBy('discount_info.end_at', 'DESC')
                        ->take(3)
                        ->get();

        //Show oil product to Index
        $oils_id = Product_type::where('name', 'like', '%dầu ăn%')->first();
        $product_oils = Product::select('product.id','product.name','product.images','product.price','discount_info.promotion_price','discount_info.end_at','discount_info.status','product.created_at')
                        ->leftJoin('discount_info','discount_info.id_product','=','product.id')
                        ->where('product.id_type',$oils_id->id)
                        ->where('product.status', 1)
                        ->orderBy('product.created_at', 'DESC')
                        ->orderBy('discount_info.end_at', 'DESC')
                        ->take(3)
                        ->get();

        //Show noodle to index
        $noodle_id = Product_type::where('name', 'like', '%Mì, Pasta%')->first();
        $product_noodles = Product::select('product.id','product.name','product.images','product.price','discount_info.promotion_price','discount_info.end_at','discount_info.status','product.created_at')
                            ->leftJoin('discount_info','discount_info.id_product','=','product.id')
                            ->where('product.id_type',$noodle_id->id)
                            ->where('product.status', 1)
                            ->orderBy('product.created_at', 'DESC')
                            ->orderBy('discount_info.end_at', 'DESC')
                            ->take(3)
                            ->get();

        //Show discount products to index
        $product_discounts = Discount_info::take(10)->get();
        return view('home.index', compact('product_nuts', 'product_oils', 'product_noodles','product_discounts'));
    }
}
