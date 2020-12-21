<?php

namespace App\Http\Controllers;

use App\Description_images;
use App\Discount_info;
use App\Group_type;
use App\Product;
use App\Product_type;
use App\Rating;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Product by type
    public function Product(Request $req)
    {
        //Show product by product type
        $type = Product_type::where('id', 'like',$req->product_type)->where('status',1)->first();
        $group = Group_type::where('id', $type->id_group_type)->where('status',1)->first();
        $product_arrays = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.id_type', $type->id)
            ->where('product.status', 1)
            ->orderBy('product.created_at', 'DESC')
            ->orderBy('discount_info.end_at', 'DESC')
            ->paginate(9);
        //Show discount products to index
        $product_discounts = Discount_info::take(10)->get();
        return view('product.product', compact('product_arrays', 'product_discounts', 'group'));
    }
    //Info single product
    public function Single(Request $req)
    {
        //Product info
        $product = Product::select('product.id', 'product.name', 'product.images','product.description', 'product.id_type', 'product.price','product.quantity', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.id', $req->id)
            ->where('product.status', 1)
            ->orderBy('product.created_at', 'DESC')
            ->first();
        //Same type product
        $same_type_products = Product::select('product.id', 'product.name', 'product.images','product.description', 'product.id_type', 'product.price','product.quantity', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.id_type', $product->id_type)
            ->where('product.status', 1)
            ->where('product.id', '!=', $product->id)
            ->orderBy('product.created_at', 'DESC')
            ->inRandomOrder()
            ->limit(10)
            ->get();
        //dd($same_type_products);
        $rating = Rating::where('id_product',$product->id)->get();
        $average=0;
        $star=0;
        $i=0;
        foreach($rating as $rate){
            $star+=$rate->star_point;
            $i++;
        }
        if($i==0){
            $average=0;
        }else{
            $average = (int)($star/$i);
        }
        $images = Description_images::where('id_product', $product->id)->get();
        return view('product.single', compact('product', 'same_type_products', 'images','average'));
    }
}
