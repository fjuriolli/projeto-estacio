<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    protected $table = 'itinerarios';
    protected $fillable = [
        'linha_id',
        'logradouro',
        'bairro',
        'municipio'
    ];
}
