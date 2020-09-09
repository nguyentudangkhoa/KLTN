<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_role', 'status', 'gender', 'phone', 'login_time', 'logout_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Roles()
    {
        return $this->belongsTo("App\Roles", "id_role", "id");
    }
    public function User_Address()
    {
        return $this->hasMany("App\User_address", "id_user", "id");
    }
    public function Customer()
    {
        return $this->hasMany("App\Customer", "id_user", "id");
    }
}
