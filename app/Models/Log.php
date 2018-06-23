<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    
    protected $fillable = [
        'id_parada',
        'nome',
        'endereco_completo',
        'tempo',
        'onibus_id',
        'onibus_nome',
        'linha_id'
    ];
}
