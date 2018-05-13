<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itinerario;
use App\Models\Linha;
use App\Models\Logradouro;

class ItinerarioController extends Controller
{
    public function create()
    {
        $itinerarios = Itinerario::get()->all();
        $logradouros = Logradouro::get()->all();
        $linhas = Linha::get()->all();
        return view('cadastro.cadastro-itinerario', compact('itinerarios', 'linhas', 'logradouros'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $itinerario = Itinerario::create($dados);
        $itinerario = Itinerario::find($itinerario->id);
        $itinerario->logradouros()->attach($dados['logradouro_id']);
        return view('registro-sucesso');
    }
}