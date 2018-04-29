<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anel extends Model
{
    protected $table = 'aneis';
    protected $fillable = [
        'linha_id',
        'nome',
        'tarifa'
    ];
}
