<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parada;

class ParadaController extends Controller
{
    public function create()
    {
        $paradas = Parada::get()->all();
        return view('cadastro.cadastro-parada', compact('paradas'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        Parada::create($dados);
        return view('registro-sucesso');
    }
}
