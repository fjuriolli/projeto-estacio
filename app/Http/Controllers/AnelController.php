<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anel;

class AnelController extends Controller
{
    public function lista()
    {
        $aneis = Anel::all();
        return view('cadastro.anel-listagem', compact('aneis'));
    }

    public function mostra($id) 
    {
        $anel = Anel::find($id);

        if (empty($anel)) {
            return "Esse anel não existe";
        }

        return view('cadastro.anel-detalhes')->with('a', $anel);
    }

    public function adiciona(Request $request)
    {
        $dados = $request->all();
        try {
            Anel::create($dados);
            
         } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-cadastrar');
        }    
        return redirect()->action('AnelController@lista');
    }

    public function remove($id) {
        $anel = Anel::find($id);
        try {
            $anel->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-deletar');
        }
        return redirect()->action('AnelController@lista');
    }

    public function novo() {
        return view('cadastro.cadastro-anel');
    }
}