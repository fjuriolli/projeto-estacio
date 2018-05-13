<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    
    protected $fillable = [
        'nome',
        'duracao'
    ];

    public function linhas()
    {
        return $this->belongsTo('App\Models\Linha');
    }
}
