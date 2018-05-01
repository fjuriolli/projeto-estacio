<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    protected $table = 'paradas';

    protected $fillable = [
        'cod_identificacao',
        'nome',
        'endereco_completo'
    ];
}
