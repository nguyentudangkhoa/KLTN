<?php

namespace App\Http\Controllers;

use App\Bills;
use App\Customer;
use App\Http\Controllers\Controller;
use App\User;
use App\User_address;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function ShowProfile(Request $req){
        $user = User::find($req->id);
        $customer = Customer::where('id_user',$user->id)->first();
        if($customer){
            $bills = Bills::where('id_customer',$customer->id)->get();
            return view('profile.profile-user',compact('user','bills'));
        }
        return view('profile.profile-user',compact('user'));
    }
    //change profile
    public function ChangeProfile(Request $req){
        $name = $req->name;
        $gender = $req->gender;
        $phone = $req->phone;
        if($name == ""){
            return response()->json(['report'=>'Tên của bạn không được để trống']);
        }else if($gender == null){
            return response()->json(['report'=>'Bạn vui lòng chọn giới tính']);
        }else if($phone == ""){
            return response()->json(['report'=>'Số diện thoại không được để trống']);
        }else if(strlen($phone) < 10 || strlen($phone) > 10){
            return response()->json(['report'=>'Số điện thoại của bạn phải đúng 10 số.']);
        }else if(!is_numeric($phone)){
            return response()->json(['report'=>'Số điện thoại của bạn phải là số']);
        }else {
            User::where('id',$req->id)->update(['name'=>$name,'gender'=>$gender,'phone'=>$phone]);
            return response()->json(['success'=>'Thay đổi thành công']);
        }

    }
    //change avatar
    public function EditAvatar(Request $req){
        $image = $req->file('image');
        if ($req->hasFile('image')) {
            $image->move('dist/img', $image->getClientOriginalName('myFile')); //save images at resource/image
            User::where('id',Auth::user()->id)->update(['image'=>$image->getClientOriginalName('myFile')]);
            return redirect()->back()->with('Update-Avatar','Update Avartar successfull');
        }

    }
    //add new address
    public function AddAddress(Request $req){
        if($req->address == ""){
            return response()->json(['report'=>'Địa chỉ không được trống']);
        }else{
            User_address::create(['address'=>$req->address,'id_user'=>Auth::user()->id]);
            return response()->json(['success'=>'Thêm địa chỉ thành công']);
        }
    }
}
