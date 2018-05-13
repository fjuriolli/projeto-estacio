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
        return $this->belongsToMany('App\Models\Parada', 'logradouro_parada'); 
    }

    public function itinerarios()
    {
        return $this->belongsToMany('App\Models\Itinerario', 'itinerario_logradouro');
    }
}
