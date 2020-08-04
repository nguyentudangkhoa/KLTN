<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description_images extends Model
{
    protected $table = "description_images";
    public $fillable = ['images','id_product'];
    public function Product(){
        return $this->belongsTo("App\Product","id_product","id");
    } 
}
