<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = "bills";
    public $fillable = ['id_user','id_payment','order_date','status','note'];
    public function Bill_Detail(){
        return $this->hasMany("App\Bill_details","id_bill","id");
    }
    public function Payment(){
        return $this->belongsTo("App\Payment","id_payment","id");
    }
}
