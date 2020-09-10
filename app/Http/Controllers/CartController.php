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
        $product = Product::select('product.id', 'product.name', 'product.images', 'product.price','discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at', 'product.id_unit')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('product.id', $req->id)
            ->orderBy('discount_info.end_at', 'DESC')
            ->first(); //Find product by id

        $oldCart = Session('cart') ? Session::get('cart') : null; // Check Session
        $cart = new Cart($oldCart); //Add sesion to model Cart
        $cart->add($product, $req->id);
        $req->session()->put('cart', $cart);
        return response()->json(['report' => "Đã thêm $product->name vào giỏ hàng thành công", 'quantity' => Session('cart')->totalQty]);
    }
    //Minus quantity
    public function MinusQuantity(Request $req)
    {
        $id = $req->id;
        if ($req->quantity <= 1) {
            return response()->json(['report' => 'Không thể giảm số luợng xuống thêm']);
        } else {
            $oldCart = Session::get('cart');

            if ($oldCart->items[$id]['item']['promotion_price'] == null) {
                $oldCart->items[$id]['price'] -= $oldCart->items[$id]['item']['price'];
                $oldCart->totalPrice -= $oldCart->items[$id]['item']['price'];
            } else if ($oldCart->items[$id]['item']['promotion_price'] > 0 && strtotime($oldCart->items[$id]['item']['end_at']) < strtotime(date("Y-m-d"))) {
                $oldCart->items[$id]['price'] -= $oldCart->items[$id]['item']['price'];
                $oldCart->totalPrice -= $oldCart->items[$id]['item']['price'];
            } else {
                $oldCart->items[$id]['price'] -= $oldCart->items[$id]['item']['promotion_price'];
                $oldCart->totalPrice -= $oldCart->items[$id]['item']['promotion_price'];
            }
            $oldCart->totalQty -= 1;
            $oldCart->items[$id]['qty'] -= 1;
            return response()->json([
                'produt_quantity' => $oldCart->items[$id]['qty'],
                'price_product_all' => $oldCart->items[$id]['price'],
                'quantity' => Session('cart')->totalQty ? Session('cart')->totalQty : 1,
                'total_price' => $oldCart->totalPrice
            ]);
        }
    }
    //Add more quantity
    public function PlusQuantity(Request $req)
    {
        $id = $req->id;
        $oldCart = Session::get('cart');

        if ($oldCart->items[$id]['item']['promotion_price'] == null) {
            $oldCart->items[$id]['price'] += $oldCart->items[$id]['item']['price'];
            $oldCart->totalPrice += $oldCart->items[$id]['item']['price'];
        } else if ($oldCart->items[$id]['item']['promotion_price'] > 0 && strtotime($oldCart->items[$id]['item']['end_at']) < strtotime(date("Y-m-d"))) {
            $oldCart->items[$id]['price'] += $oldCart->items[$id]['item']['price'];
            $oldCart->totalPrice += $oldCart->items[$id]['item']['price'];
        } else {
            $oldCart->items[$id]['price'] += $oldCart->items[$id]['item']['promotion_price'];
            $oldCart->totalPrice += $oldCart->items[$id]['item']['promotion_price'];
        }
        $oldCart->totalQty += 1;
        $oldCart->items[$id]['qty'] += 1;
        return response()->json([
            'produt_quantity' => $oldCart->items[$id]['qty'],
            'price_product_all' => $oldCart->items[$id]['price'],
            'quantity' => Session('cart')->totalQty ? Session('cart')->totalQty : 1,
            'total_price' => $oldCart->totalPrice
        ]);
    }
    //Change quantity
    public function ChangeQuantity(Request $req){
        if($req->id){
            $total_price = 0;
            $total_quan = 0;
            $oldCart = Session::get('cart');
            $id = $req->id;
            if($req->quantity > 0 || $req->quantity != null){
                $quantity = $req->quantity;
            }else if($req->quantity == null) {
                $quantity = 1;
            }else{
                $quantity = 1;
            }
            $oldCart->items[$id]['qty'] = $quantity;
            if($oldCart->items[$id]['item']['promotion_price'] == null){
                $oldCart->items[$id]['price'] = $oldCart->items[$id]['qty'] * $oldCart->items[$id]['item']['price'];
            }else{
                $oldCart->items[$id]['price'] = $oldCart->items[$id]['qty'] * $oldCart->items[$id]['item']['promotion_price'];
            }
            foreach($oldCart->items as $key => $value){
                $total_price += $value['price'];
                $total_quan += $value['qty'];
            }
            $oldCart->totalPrice = $total_price;
            $oldCart->totalQty =$total_quan;
            return response()->json([
                'produt_quantity' => $oldCart->items[$id]['qty'],
                'price_product_all' => $oldCart->items[$id]['price'],
                'quantity' => Session('cart')->totalQty ? Session('cart')->totalQty : 1,
                'total_price' => $oldCart->totalPrice
            ]);
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
            return response()->json([
                'report' => "xóa $product->name trong giỏ hàng thành công",
                'quantity' => Session::get('cart') ? Session::get('cart')->totalQty : 0,
                'total_price' => ($oldCart->totalPrice - $oldCart->items[$req->id]['price'])
            ]);
        } else {
            Session::forget('cart');
            return response()->json(['route' => route('index')]);
        }
    }
}
