<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;

class CheckoutController extends Controller
{
    public function Checkout(){
        if (Session('cart')) { // Checkout template with existing Session
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('checkout-payment.checkout')->with([
                'cart' => Session::get('cart'),
                'product_cart' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ]);
        }else{
            return view('checkout-payment.checkout');
        }

    }
}
