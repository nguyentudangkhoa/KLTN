<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

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
            Product::where('id', $id)->update(['name' => $name, 'price' => $price, 'quantity' => $quantity, 'status' => 1, 'description' => $description, 'id_type' => $category]);
            $product = Product::where('name', $name)->first();
            return response()->json([
                'success' => "Sửa sản phẩm thành công.",
                'id' => $product->id
            ]);
        } else if ($category == null) {
            Product::where('id', $id)->update(['name' => $name, 'price' => $price, 'quantity' => $quantity, 'status' => 1, 'description' => $description, 'id_unit' => $unit]);
            $product = Product::where('name', $name)->first();
            return response()->json([
                'success' => "Sửa sản phẩm thành công.",
                'id' => $product->id
            ]);
        } else if ($category == null && $unit == null) {
            Product::where('id', $id)->update(['name' => $name, 'price' => $price, 'quantity' => $quantity, 'status' => 1, 'description' => $description]);
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
    public function UpdateImagesProduct(Request $req)
    {
        $image = $req->file('productimage');
        if ($req->hasFile('productimage')) {
            if ($image->getClientOriginalExtension('myFile') == 'png' || $image->getClientOriginalExtension('myFile') == 'jpg' || $image->getClientOriginalExtension('myFile') == 'jpeg') {
                $product = Product::find($req->id_pro);
                $image->move('assets/images', $image->getClientOriginalName('myFile')); //save images at resource/image
                Product::where('id', $req->id_pro)->update(['images' => $image->getClientOriginalName('myFile')]);
                return redirect()->back()->with('Update-Images-Product-ss', "Cập nhật hình ảnh sản phẩm $product->name thành công");

            } else {
                return redirect()->back()->with('Update-Images-Product-ff', 'Bạn vui lòng tải file hình lên dưới dạng PNG, JPEG, JPG.');
            }
        } else {
            return redirect()->back()->with('Update-Images-Product', 'Bạn vui lòng chọn hình ảnh của bạn.');
        }
    }
}
