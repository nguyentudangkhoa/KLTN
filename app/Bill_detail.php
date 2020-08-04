<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = "bill_detail";
    public $fillable=['id_bill','id_product','price','quantity'];
    public function Bill(){
        return $this->belongsTo("App\Bills","id_bill","id");
    }
    public function Product(){
        return $this->belongsToMany("App\Product","id_product","id");
    }
}
