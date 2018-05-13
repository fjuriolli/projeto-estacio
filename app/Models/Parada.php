<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parada extends Model
{
    protected $table = 'paradas';

    protected $fillable = [
        'cod_identificacao',
        'nome',
        'endereco_completo'
    ];

    public function logradouros()
    {
        return $this->belongsTo('App\Models\Logradouro');
    }
}
