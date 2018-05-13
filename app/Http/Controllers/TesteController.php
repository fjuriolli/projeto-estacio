<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class TesteController extends Controller
{
    public function get() {
      $teste = Evento::get()->all();
      return view('teste-seeders-view')->with('teste', $teste);
    }
}
