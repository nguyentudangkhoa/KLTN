<?php

namespace App\Http\Controllers;

use App\Discount_info;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //Search ajax
    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = Product::where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu ajax-list" style="display:block; position:absolute ">';
            foreach ($data as $row) {
                $output .= '
                <li class="item"><a href="product-details?product_name=' . $row->name . '"><img src="assets/images/' . $row->images . '" style="height:30px; width:30px;"> ' . $row->name . '</a></li><br>
                ';
            }
            $output .= '</ul>';
            echo $output;
        } else {
            echo '<ul class="dropdown-menu ajax-list" style="display:block; position:absolute "> <li class="item"> Product do not exist </li> </ul>';
        }
    }
    //Search normal
    public function SearchProduct(Request $req)
    {
        $product_arrays = Product::select('product.id', 'product.name', 'product.images', 'product.price', 'discount_info.promotion_price', 'discount_info.end_at', 'discount_info.status', 'product.created_at')
            ->leftJoin('discount_info', 'discount_info.id_product', '=', 'product.id')
            ->where('name', 'like', '%' . $req->search . '%')
            ->where('product.status', 1)
            ->orderBy('product.created_at', 'DESC')
            ->orderBy('discount_info.end_at', 'DESC')
            ->paginate(9);
        //Show discount products to index
        $product_discounts = Discount_info::take(10)->get();
        return view('product.search', compact('product_arrays', 'product_discounts'));
    }
}
