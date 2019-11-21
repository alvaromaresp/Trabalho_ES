<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{

    protected $guarded = ['id'];
    public $timestamps = false;
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

}
