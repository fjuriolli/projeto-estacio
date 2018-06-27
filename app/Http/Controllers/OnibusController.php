<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onibus;
use App\Models\Linha;

class OnibusController extends Controller
{
    public function lista()
    {
        $onibus = Onibus::all();
        $linhas = Linha::all();

        return view('cadastro.onibus-listagem', compact('onibus', 'linhas'));
    }

    public function mostra($id) 
    {
        $onibus = Onibus::find($id);

        if (empty($onibus)) {
            return "Este ônibus não existe";
        }

        return view('cadastro.onibus-detalhes')->with('a', $onibus);
    }

    public function adiciona(Request $request)
    {
        $dados = $request->all();
        
        try {
            $onibus = Onibus::create($dados);

         } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-cadastrar');
        }    
        return redirect()->action('OnibusController@lista');
    }

    public function remove($id)
    {
        $onibus = Onibus::find($id);
        try {
            $onibus->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-deletar');
        }
        return redirect()->action('OnibusController@lista');
    }

    public function novo() 
    {
        $onibus = Onibus::all();
        $linhas = Linha::all();

        return view('cadastro.cadastro-onibus', compact('onibus', 'linhas'));
    }
}
