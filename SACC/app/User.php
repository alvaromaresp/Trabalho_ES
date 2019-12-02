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
        'name', 'email', 'password',
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

    public function carros()
    {
        return $this->hasMany('App\Carro');
    }

    public function caronasOferecidas()
    {
        return $this->hasMany('App\Carona', 'oferece');
    }
    public function caronasProcuradas()
    {
        return $this->belongsToMany('App\Carona', 'carona_procura', 'usuario', 'carona');
    }
}
