<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onibus;
use App\Models\Linha;
use App\Models\Anel;

class LinhaController extends Controller
{
    public function lista()
    {
        $linhas = Linha::all();
        $aneis = Anel::all();

        return view('cadastro.linha-listagem', compact('linhas', 'aneis'));
    }

    public function mostra($id) 
    {
        $linha = Linha::find($id);

        if (empty($linha)) {
            return "Esta linha não existe";
        }

        return view('cadastro.linha-detalhes')->with('a', $linha);
    }

    public function adiciona(Request $request)
    {
        $dados = $request->all();
        try {
            Linha::create($dados);
            
         } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-cadastrar');
        }    
        return redirect()->action('LinhaController@lista');
    }

    public function remove($id)
    {
        $linha = Linha::find($id);
        try {
            $linha->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return view('query-exception-deletar');
        }
        return redirect()->action('LinhaController@lista');
    }

    public function novo() 
    {
        $linhas = Linha::all();
        $aneis = Anel::all();

        return view('cadastro.cadastro-linha', compact('linhas', 'aneis'));
    }
}