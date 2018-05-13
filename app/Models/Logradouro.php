<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model
{
    protected $table = 'logradouros';

    protected $fillable = [
        'nome',
        'bairro',
        'municipio'
    ];

    public function paradas()
    {
        return $this->hasMany('App\Models\Parada'); 
    }

    public function itinerarios()
    {
        return $this->belongsTo('App\Models\Itinerario');
    }
}
