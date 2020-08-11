<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    protected $table = "product_type";
    public $fillable = ['name','id_group_type','status'];
    public function Group_Type(){
        return $this->belongsTo("App\Group_type","id_group_type","id");
    }
}
