<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = "rating";
    public $fillable = ['star_point','id_user','id_product'];
    public function Product(){
        return $this->belongsTo("App\Product","id_product","id");
    } 
    public function Users(){
        return $this->belongsTo("App\Users","id_user","id");
    }
}
