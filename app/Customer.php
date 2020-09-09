<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";
    public $fillable = ['name', 'email', 'gender', 'address', 'phone_number'];
    public function Bill()
    {
        $this->hasMany("App\Bills", "id_customer", "id");
    }
    public function User()
    {
        return $this->belongsTo("App\Customer", "id_user", "id");
    }
}
