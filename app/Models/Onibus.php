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

    public $timestamps = false;

    public function linhas()
    {
        return $this->belongsTo('App\Models\Linha');
    }

    public function paradas()
    {
        return $this->belongsToMany('App\Models\Parada');
    }
}
