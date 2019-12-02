<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carona extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getOferece()
    {
        return $this->belongsTo('App\User', 'id');
    }
    public function getProcura()
    {
        return $this->belongsToMany('App\User', 'carona_procura', 'carona', 'usuario');
    }
    public function getCarro()
    {
        return $this->belongsTo('App\Carro', 'carro');
    }
}
