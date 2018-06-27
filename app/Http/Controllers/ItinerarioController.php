<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itinerario;
use App\Models\Linha;
use App\Models\Logradouro;

class ItinerarioController extends Controller
{
    public function lista()
    {
        $itinerarios = Itinerario::all();
        $logradouros = Logradouro::all();
        $linhas = Linha::all();

        return view('cadastro.itinerario-listagem', compact('itinerarios', 'logradouros', 'linhas'));
    }

    public function mostra($id) 
    {
        $itinerario = Itinerario::find($id);

        if (empty($itinerario)) {
            return "Este itinerario não existe";
        }

        return view('cadastro.itinerario-detalhes')->with('a', $itinerario);
    }

    public function adiciona(Request $request)
    {
        $dados = $request->all();
        
        try {
            $itinerario = Itinerario::create($dados);
            $itinerario = Itinerario::find($itinerario->id);
            $itinerario->logradouros()->attach($dados['logradouro_id']);

         } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-cadastrar');
        }    
        return redirect()->action('ItinerarioController@lista');
    }

    public function remove($id)
    {
        $itinerario = Itinerario::find($id);
        try {
            $itinerario->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-deletar');
        }
        return redirect()->action('ItinerarioController@lista');
    }

    public function novo() 
    {
        $itinerarios = Itinerario::all();
        $logradouros = Logradouro::all();
        $linhas = Linha::all();

        return view('cadastro.cadastro-itinerario', compact('itinerarios', 'logradouros', 'linhas'));
    }
}