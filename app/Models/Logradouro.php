<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model
{
    protected $table = 'logradouros';

    protected $fillable = [
        'nome',
        'bairro',
        'municipio'
    ];

    //TO DO RELACIONAMENTOS
}
