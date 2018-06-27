<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;

class LogradouroController extends Controller
{
     public function lista()
    {
        $paradas = Parada::all();
        $logradouros = Logradouro::all();

        return view('cadastro.logradouro-listagem', compact('paradas', 'logradouros'));
    }

    public function mostra($id)
    {
        $logradouro = Logradouro::find($id);

        if (empty($logradouro)) {
            return "Este logradouro não existe";
        }

        return view('cadastro.logradouro-detalhes')->with('a', $logradouro);
    }
    
    public function adiciona(Request $request)
    {
        $dados = $request->all();
        
        try {
            $logradouro = Logradouro::create($dados);
            $logradouro = Logradouro::find($logradouro->id);
            $logradouro->paradas()->attach($dados['parada_id']);

         } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-cadastrar');
        }    
        return redirect()->action('LogradouroController@lista');
    }

    public function remove($id)
    {
        $logradouro = Logradouro::find($id);
        try {
            $logradouro->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-deletar');
        }
        return redirect()->action('LogradouroController@lista');
    }

    public function novo() 
    {
        $paradas = Parada::all();
        $logradouros = Logradouro::all();

        return view('cadastro.cadastro-logradouro', compact('paradas', 'logradouros'));
    }
}
