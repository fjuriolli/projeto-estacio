<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    protected $table = 'linhas';
    protected $fillable = [
        'parada_id',
        'anel_id',
        'nome',
        'qtd_onibus',
        'classificacao',
        'horario_saida',
        'horario_retorno'
    ];
}
