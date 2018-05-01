<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    
    protected $fillable = [
        'nome',
        'descricao',
        'duracao'
    ];

    public function linhas()
    {
        return $this->belongsTo('App\Models\Linha');
    }
}
