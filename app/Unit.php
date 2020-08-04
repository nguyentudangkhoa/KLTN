<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = "unit";
    public $fillable = ['name'];
    public function Product(){
        return $this->hasMany("App\Product","id_unit","id");
    }
}
