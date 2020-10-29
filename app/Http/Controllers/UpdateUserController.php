<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function UpdateUser(Request $req){
        $id = $req->id;
        $name = $req->name;
        $role = $req->role;
        $gender = $req->gender;
        $phone = $req->phone;
        if($name == ""){
            return response()->json(['report'=>'Tên người dùng không được để trống.']);
        }else if($phone == ""){
            return response()->json(['report'=>'Số điện thoại người dùng không được để trống.']);
        }else if($role == null){
            User::where('id',$id)->update(['name'=>$name,'gender'=>$gender,'phone'=>$phone]);
            return response()->json(['success'=>'Cập nhật người dùng thành công.']);
        }else if($gender == null){
            User::where('id',$id)->update(['name'=>$name,'id_role'=>$role,'phone'=>$phone]);
            return response()->json(['success'=>'Cập nhật người dùng thành công.']);
        }else if($gender == null && $role == null){
            User::where('id',$id)->update(['name'=>$name,'phone'=>$phone]);
            return response()->json(['success'=>'Cập nhật người dùng thành công.']);
        }else {
            User::where('id',$id)->update(['name'=>$name,'id_role'=>$role,'gender'=>$gender,'phone'=>$phone]);
            return response()->json(['success'=>'Cập nhật người dùng thành công.']);
        }
    }
}
