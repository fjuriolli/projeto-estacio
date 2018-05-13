<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anel extends Model
{
    protected $table = 'aneis';

    protected $fillable = [
        'nome',
        'tarifa'
    ];

    public function linhas()
    {
        return $this->belongsTo('App\Models\Linha');
    }
}
