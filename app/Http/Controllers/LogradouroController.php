<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;

class LogradouroController extends Controller
{
    public function create()
    {
        $paradas = Parada::get()->all();
        $logradouros = Logradouro::get()->all();
        return view('cadastro.cadastro-logradouro', compact('paradas', 'logradouros'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $logradouro = Logradouro::create($dados);
        $logradouro = Logradouro::find($logradouro->id);
        $logradouro->paradas()->attach($dados['parada_id']);
        return view('registro-sucesso');
    }
}
