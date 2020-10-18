<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table = "bills";
    public $fillable = ['id_customer','id_payment', 'total', 'quantity','order_date','status','note'];
    public function Bill_Detail(){
        return $this->hasMany("App\Bill_detail","id_bill","id");
    }
    public function Payment(){
        return $this->belongsTo("App\Payment","id_payment","id");
    }
    public function Customer(){
        return $this->belongsTo("App\Customer","id_customer","id");
    }
}
