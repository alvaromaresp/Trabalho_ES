<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function getCarona()
    {
        return $this->belongsTo('App\Carona', 'carona');
    }

    public function getAutor()
    {
        return $this->belongsTo('App\User', 'autor');
    }
}
