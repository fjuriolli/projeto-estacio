<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    protected $table = 'linhas';
    protected $fillable = [
        'anel_id',
        'evento_id',
        'onibus_id',
        'nome',
        'classificacao',
    ];

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
