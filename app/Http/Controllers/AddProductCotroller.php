<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Product_type;
use Illuminate\Http\Request;
use Validator;

class AddProductCotroller extends Controller
{
    public function AddProduct(Request $req){
        $name= $req->name;
        $price = $req->price;
        $quantity = $req->quantity;
        $unit = $req->unit;
        $category = $req->category;
        $description = $req->description;
        $image = $req->file('image');
        if($name == ""){
            return response()->json(['report'=>'Tên sản phẩm không được để trống.']);
        }else if($price == "") {
            return response()->json(['report'=>"Giá sản phẩm không được để trống."]);
        }else if(!is_numeric($price)){
            return response()->json(['report'=>"Giá sản phẩm phải là số."]);
        }else if($quantity == ""){
            return response()->json(['report'=>"Số lượng sản phẩm không được để trống."]);
        }else if(!is_numeric($quantity)){
            return response()->json(['report'=>"Số lượng sản phẩm phải là số."]);
        }else if($unit == null){
            return response()->json(['report'=>"Vui lòng chọn đơn vị của sản phẩm."]);
        }else if($category == null){
            return response()->json(['report'=>"Vui lòng chọn loại sản phẩm của sản phẩm."]);
        }else{
            if ($req->hasFile('image')) {
                if($image->getClientOriginalExtension('myFile') == 'png' || $image->getClientOriginalExtension('myFile') == 'jpg' || $image->getClientOriginalExtension('myFile') == 'jpeg' ){
                    $image->move('assets/images', $image->getClientOriginalName('myFile')); //save images at resource/image
                    Product::create(['name'=>$name,'price'=>$price,'images'=>$image->getClientOriginalName('myFile'),'quantity'=>$quantity,'status'=>1,'description'=>$description,'id_unit'=>$unit,'id_type'=>$category]);
                    $product = Product::where('name',$name)->first();
                    return response()->json(['success'=>"Thêm sản phẩm thành công.",
                                             'img'=>$image->getClientOriginalName('myFile'),
                                             'id'=>$product->id]);
                }else {
                    return response()->json(['report'=>"Bạn vui lòng tải file hình lên dưới dạng PNG, JPEG, JPG."]);
                }

            }else{
                return response()->json(['report'=>"Bạn vui nhập ảnh."]);
            }


        }
    }
}
