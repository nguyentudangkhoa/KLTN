<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount_info extends Model
{
    public $table = "discount_info";
    public $fillable = ['promotion_price','begin_at','end_at','id_product','status'];
    public function Product(){
        return $this->belongsTo("App\Product","id_product","id");
    } 
}
