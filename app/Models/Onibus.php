<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';
    
    protected $fillable = [
        'nome',
        'marca'
    ];

    public function linhas()
    {
        return $this->belongsTo('App\Models\Linha');
    }
}
