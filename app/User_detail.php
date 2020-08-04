<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    protected $table = "user_details";
    public $fillable = ['address','phone_number','id_user'];
    public function Users(){
        return $this->belongsTo("App\Users","id_user","id");
    }
}
