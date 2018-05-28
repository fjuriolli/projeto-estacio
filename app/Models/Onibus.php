<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';
    
    protected $fillable = [
        'nome',
        'marca',
        'parada_atual'
    ];

    public function linhas()
    {
        return $this->belongsToMany('App\Models\Linha');
    }

    public function paradas()
    {
        return $this->belongsToMany('App\Models\Parada');
    }
}
