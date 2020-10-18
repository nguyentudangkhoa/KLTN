<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class UpdateProductController extends Controller
{

    public function UpdateProduct(Request $req)
    {
        $name = $req->name;
        $price = $req->price;
        $quantity = $req->quantity;
        $unit = $req->unit;
        $category = $req->category;
        $description = $req->description;
        $id = $req->id;
        if ($name == "") {
            return response()->json(['report' => 'Tên sản phẩm không được để trống.']);
        } else if ($price == "") {
            return response()->json(['report' => "Giá sản phẩm không được để trống."]);
        } else if (!is_numeric($price)) {
            return response()->json(['report' => "Giá sản phẩm phải là số."]);
        } else if ($quantity == "") {
            return response()->json(['report' => "Số lượng sản phẩm không được để trống."]);
        } else if (!is_numeric($quantity)) {
            return response()->json(['report' => "Số lượng sản phẩm phải là số."]);
        } else if ($unit == null) {
            Product::where('id',$id)->update(['name'=>$name,'price'=>$price,'quantity'=>$quantity,'status'=>1,'description'=>$description,'id_type'=>$category]);
                    $product = Product::where('name',$name)->first();
                    return response()->json(['success'=>"Sửa sản phẩm thành công.",
                                             'id'=>$product->id]);
        } else if ($category == null) {
            Product::where('id', $id)->update(['name' => $name, 'price' => $price, 'quantity' => $quantity, 'status' => 1, 'description' => $description, 'id_unit' => $unit]);
            $product = Product::where('name', $name)->first();
            return response()->json([
                'success' => "Sửa sản phẩm thành công.",
                'id' => $product->id
            ]);
        } else {
            Product::where('id', $id)->update(['name' => $name, 'price' => $price, 'quantity' => $quantity, 'status' => 1, 'description' => $description, 'id_unit' => $unit, 'id_type' => $category]);
            $product = Product::where('name', $name)->first();
            return response()->json([
                'success' => "Sửa sản phẩm thành công.",
                'id' => $product->id
            ]);
        }
    }
}
