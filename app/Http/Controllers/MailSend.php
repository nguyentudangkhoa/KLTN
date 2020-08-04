<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Mail\SendMail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Mail;

class MailSend extends Controller
{
    //ajax send mail sign up
    public function SignUp(Request $req){
        $user = User::where('email',$req->email)->First();
        if($user){
            return response()->json(['report'=>"Đã tồn tại thành viên ".$req->email]);
        }else{
            $details = [
                'title' => 'Xác nhận tài khoản đăng ký',
                'body' => 'Click vào link để hoàn thành đăng ký',
                'link' => route('sign-up','name='.$req->name.'&email='.$req->email.'&password='.Hash::make($req->password).'&gender='.$req->gender),
                'layout'=>'mail.sign-up-mail'
            ];

            Mail::to($req->email)->send(new SendMail($details));
            return response()->json(['report'=>"Đã gửi mail xác nhận đăng ký cho ".$req->email]);
        }
    }
}
