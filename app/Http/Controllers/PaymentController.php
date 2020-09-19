<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use App\Bills;
use App\Customer;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mail;
use \App\Mail\SendMail;

class PaymentController extends Controller
{
    public function MakeCODPayment(Request $req){
        $name = $req->name;
        $email = $req->email;
        $phone_number = $req->phone_number;
        $address = $req->address;
        if($name == ""){
            return response()->json(['report' => "Bạn vui lòng nhập họ tên"]);
        }else if($phone_number == ""){
            return response()->json(['report' => "Bạn vui lòng nhập số điện thoại"]);
        }else if($address == ""){
            return response()->json(['report' => "Bạn vui lòng nhập địa chỉ giao hàng"]);
        }else if(!is_numeric($phone_number)){
            return response()->json(['report' => "Số điện thoại của bạn phải là số"]);
        }else {
            if(Auth::check()){//check login
                $user = User::find(Auth::user()->id);
                $user->total_buy += 1;
                $user->save();
                $customer = new Customer;// create new customer
                $customer->name=$name;
                $customer->email=$email;
                $customer->address=$address;
                $customer->phone_number=$phone_number;
                $customer->id_user = Auth::user()->id;
                $customer->save();
                $cart= Session::get('cart');//get session cart
                $bill = new Bills;//create new bill
                $bill->id_customer=$customer->id;
                $bill->id_payment=1;
                $bill->total=$cart->totalPrice;
                $bill->order_date=date("Y-m-d H:i:s");
                $bill->status=1;
                $bill->save();
                foreach ($cart->items as $key => $value) {
                    Bill_detail::create(['id_bill'=>$bill->id,
                                         'id_product'=>$key,
                                         'price'=>$value['price'],
                                         'quantity'=>$value['qty']]);
                }
                $details = [
                    'title' => 'Cảm ơn đã mua hàng tại Grocery shop',
                    'name'=>$name,
                    'body' => 'Cảm ơn đã mua hàng tại Cửa hàng bách hóa chúng tôi chúc bạn một ngày mua sắm vui vẻ',
                    'layout'=>'mail.complete-payment',
                    'cart' => $cart
                ];
                Mail::to($email)->send(new SendMail($details));
                Session::forget('cart');
                return response()->json(['report' => "Đặt hàng thành công",'route'=>route('index')]);

            }else{
                $customer = new Customer;// create new customer
                $customer->name=$name;
                $customer->email=$email;
                $customer->address=$address;
                $customer->phone_number=$phone_number;
                $customer->save();
                $cart= Session::get('cart');//get session cart
                $bill = new Bills;//create new bill
                $bill->id_customer=$customer->id;
                $bill->id_payment=1;
                $bill->total=$cart->totalPrice;
                $bill->order_date=date("Y-m-d H:i:s");
                $bill->status=1;
                $bill->save();
                foreach ($cart->items as $key => $value) {
                    Bill_detail::create(['id_bill'=>$bill->id,
                                         'id_product'=>$key,
                                         'price'=>$value['price'],
                                         'quantity'=>$value['qty']]);
                }
                if($email != null){
                    $details = [
                        'title' => 'Cảm ơn đã mua hàng tại Grocery shop',
                        'name'=>$name,
                        'body' => 'Cảm ơn đã mua hàng tại Cửa hàng bách hóa chúng tôi chúc bạn một ngày mua sắm vui vẻ',
                        'layout'=>'mail.complete-payment',
                        'cart' => $cart
                    ];
                    Mail::to($email)->send(new SendMail($details));
                }
                Session::forget('cart');
                return response()->json(['report' => "Đặt hàng thành công",'route'=>route('index')]);
            }
        }
    }
}
