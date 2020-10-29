<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Mail;

class AccountController extends Controller
{
    //Login function
    public function SignIn(Request $req)
    {
        $user = User::where('email', $req->email)->first();
        // dd($user);
        if ($user) {
            $credentials = $req->only('email', 'password');
            if (!filter_var($req->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['report' => "Email không hợp lệ"]);
            } else if (strlen($req->password) <= 6) {
                return response()->json(['report' => "Password phải trên 6 ký tự"]);
            } else if ($user->status == 0) {
                return response()->json(['report' => 'Tài khoản của bạn đã bị vô hiệu hóa vui lòng liện hệ adminTài khoản của bạn đã bị vô hiệu hóa']);
            } else {
                if (Auth::attempt($credentials, $req->remember)) { //Check Existing user
                    $user = User::where('email', $req->email)->first();
                    $user->login_time = date("Y-m-d H:i:s"); //current time log in
                    $user->save();
                    if (Auth::user()->id_role == 3) {
                        return response()->json(['report' => "Đã đăng nhập với tài khoản " . $req->email, 'name' => $user->name, 'route' => route('admin-index')]);
                    } else {
                        return response()->json(['report' => "Đã đăng nhập với tài khoản " . $req->email, 'name' => $user->name, 'route' => route('profile', Auth::user()->id)]);
                    }
                } else {
                    return response()->json(['report' => "Thông tin đăng nhập sai hoặc tài khoản không tồn tại"]);
                }
            }
        }else {
            return response()->json(['report' => "Thông tin đăng nhập sai hoặc tài khoản không tồn tại"]);
        }
    }
    //Sign Up function
    public function SignUp(Request $req)
    {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'gender' => $req->gender,
            'phone' => $req->phone
        ]);
        $details = [
            'title' => 'Cảm ơn đã đăng ký thành viên tại Grocery shop',
            'name' => $req->name,
            'body' => 'Cảm ơn đã đăng ký thành viên tại Cửa hàng bách hóa chúng tôi chúc bạn một ngày mua sắm vui vẻ',
            'layout' => 'mail.success-sign-up'
        ];
        $email = $req->email;
        Mail::to($req->email)->send(new SendMail($details));
        return view('support.sign-up-success', compact('email'));
    }
    //Logout
    public function Logout()
    {
        if (Auth::check()) {
            $user = User::where('email', Auth::user()->email)->first();
            $user->logout_time = date("Y-m-d H:i:s"); //current time log out
            $user->save();
            Auth::logout(); //Logout
            return redirect()->back();
        }
    }
}
