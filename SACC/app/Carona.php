<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carona extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function oferece()
    {
        return $this->belongsTo('App\User', 'oferece');
    }
    public function procura()
    {
        return $this->belongsToMany('App\User', 'carona_procura', 'carona', 'usuario');
    }
    public function carro()
    {
        return $this->belongsTo('App\Carro', 'carro');
    }
}
