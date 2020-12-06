<?php

namespace App\Http\Controllers;

use App\Bill_detail;
use App\Http\Controllers\Controller;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryDetailController extends Controller
{
    public function ShowHistory(Request $req)
    {
        $user = User::find(Auth::user()->id);
        $billDetails = Bill_detail::where('id_bill', $req->id)->get();
        return view('support.history', compact('billDetails', 'user'));
    }
    public function Rating(Request $req)
    {
        $idUser = Auth::user()->id;
        $idProduct = $req->idPro;
        $idBill = $req->id;
        $rating = $req->rating;
        $rate = Rating::where('id_product', $idProduct)->where('id_bill', $idBill)->first();
        if ($rate) {
            return response()->json(['report'=>'Bạn đã đánh giá sản phẩm này']);
        } else {
            Rating::create([ 'star_point' => $rating, 'id_product' => $idProduct, 'id_user' => $idUser, 'id_bill' => $idBill]);
            return response()->json(['success'=>'Cảm ơn bạn đã đánh giá sản phẩm này']);
        }
    }
}
