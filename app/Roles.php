<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";
    public $fillable = ['name'];
    public function Users(){
        return $this->hasMany("App\Users","id_role","id");
    }
}
