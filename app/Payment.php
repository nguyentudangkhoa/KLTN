<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payment";
    public $fillable=['name','status'];
    public function Bill(){
        $this->hasMany("App\Bills","id_payment","id");
    }
}
