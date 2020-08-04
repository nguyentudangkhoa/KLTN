<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_type extends Model
{
    protected $table = "group_type";
    public $fillable = ['name'];
    public function Product_Type(){
        return $this->hasMany("App\Product_type","id_group_type","id");
    }
}
