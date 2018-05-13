<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    protected $table = 'itinerarios';
    
    protected $fillable = [
        'linha_id',
        'logradouro',
        'bairro',
        'municipio',
        'nome'
    ];

    public function linhas()
    {
        return $this->hasOne('App\Models\Linha'); 
    }

    public function logradouros()
    {
        return $this->hasMany('App\Models\Logradouro'); 
    }

    //TO DO RELACIONAMENTO LOGRADOURO
}
