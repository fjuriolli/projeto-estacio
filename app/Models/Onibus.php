<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';
    
    protected $fillable = [
        'nome',
        'marca',
        'parada_atual',
        'linha_id'
    ];

    public $timestamps = false;

    public function linhas()
    {
        return $this->hasMany('App\Models\Linha');
    }

    public function paradas()
    {
        return $this->belongsToMany('App\Models\Parada');
    }
}
