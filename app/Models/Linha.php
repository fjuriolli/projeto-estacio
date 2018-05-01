<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    protected $table = 'linhas';
    protected $fillable = [
        'anel_id',
        'evento_id',
        'nome',
        'qtd_onibus',
        'classificacao',
        'horario_saida',
        'horario_retorno'
    ];

    public function paradas()
    {
        return $this->belongsToMany('App\Models\Linha');
    }

    public function eventos()
    {
        return $this->hasOne('App\Models\Evento'); 
    }

    public function aneis()
    {
        return $this->hasOne('App\Models\Anel'); 
    }

    public function itinerarios()
    {
        return $this->belongsTo('App\Models\Itinerario');
    }
}
