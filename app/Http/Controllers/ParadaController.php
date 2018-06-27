<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parada;

class ParadaController extends Controller
{
    public function lista()
    {
        $paradas = Parada::all();

        return view('cadastro.parada-listagem', compact('paradas'));
    }

    public function mostra($id) 
    {
        $parada = Parada::find($id);

        if (empty($parada)) {
            return "Esta parada não existe";
        }

        return view('cadastro.parada-detalhes')->with('a', $parada);
    }

    public function adiciona(Request $request)
    {
        $dados = $request->all();
        try {
            Parada::create($dados);
            
         } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-cadastrar');
        }    
        return redirect()->action('ParadaController@lista');
    }

    public function remove($id)
    {
        $parada = Parada::find($id);
        try {
            $parada->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-deletar');
        }
        return redirect()->action('ParadaController@lista');
    }

    public function novo() 
    {
        $paradas = Parada::all();

        return view('cadastro.cadastro-parada', compact('paradas'));
    }

}
