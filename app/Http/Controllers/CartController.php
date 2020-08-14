<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $req)
    {
        $product = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.id', $req->id)
            ->orderBy('discount_info.end_at', 'DESC')
            ->first(); //Find product by id
        $oldCart = Session('cart') ? Session::get('cart') : null; // Check Session
        $cart = new Cart($oldCart); //Add sesion to model Cart
        $cart->add($product, $req->id);
        $req->session()->put('cart', $cart);
        // dd(Session::get('cart'));
        return response()->json(['report' => "Đã thêm $product->name vào giỏ hàng thành công", 'quantity' => Session('cart')->totalQty]);
    }
    public function MinusQuantity(Request $req)
    {
        $id = $req->id;
        if ($req->quantity <= 1) {
            return response()->json(['report' => 'Không thể giảm số luợng xuống thêm']);
        } else {
            $oldCart = Session::get('cart');

            if ($oldCart->items[$id]['item']['promotion_price'] == null) {
                $oldCart->totalPrice -= $oldCart->items[$id]['item']['price'];
            } else {
                $oldCart->totalPrice -= $oldCart->items[$id]['item']['promotion_price'];
            }
            $oldCart->totalQty -= 1;
            $oldCart->items[$id]['qty'] -= 1;
            return response()->json(['produt_quantity' => $oldCart->items[$id]['qty'], 'quantity' => Session('cart')->totalQty]);
        }
    }
    //Delete shopping cart
    public function DeleteCart(Request $req)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null; //Check Session
        $cart = new Cart($oldCart);
        $product = Product::find($req->id);
        $cart->removeItem($req->id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
            return response()->json(['report' => "xóa $product->name trong giỏ hàng thành công", 'quantity' => Session::get('cart') ? Session::get('cart')->totalQty : 0 ]);
        } else {
            Session::forget('cart');
            return response()->json(['route'=>route('index')]);
        }

    }
}
