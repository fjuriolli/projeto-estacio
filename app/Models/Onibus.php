<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onibus extends Model
{
    protected $table = 'onibus';
    protected $fillable = [
        'parada_id',
        'evento_id',
        'nome'
    ];
}
