<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_address extends Model
{
    protected $table = "user_address";
    public $fillable = ['address','id_user'];
    public function Users(){
        return $this->belongsTo("App\User","id_user","id");
    }
}
