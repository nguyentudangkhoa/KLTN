<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = "comments";
    public $fillable = ['Content','parent_id','id_product','id_user'];
    public function Product(){
        return $this->belongsTo("App\Product","id_product","id");
    } 
    public function Users(){
        return $this->belongsTo("App\Users","id_user","id");
    }
}
