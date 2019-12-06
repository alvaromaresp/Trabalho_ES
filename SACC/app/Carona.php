<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carona extends Model
{

    protected $guarded = ['id'];
    public $timestamps = false;
    //teste

    public function getOferece()
    {
        return $this->belongsTo('App\User', 'oferece');
    }
    public function getProcura()
    {
        return $this->belongsToMany('App\User', 'carona_procura', 'carona', 'usuario');
    }
    public function getCarro()
    {
        return $this->belongsTo('App\Carro', 'carro');
    }
    public function getFeedbacks()
    {
        return $this->hasMany('App\Feedback', 'carona', 'id');
    }
}
