<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onibus;
use App\Models\Linha;
use App\Models\Anel;

class LinhaController extends Controller
{
    public function create()
    {
        $onibus = Onibus::get()->all();
        $linhas = Linha::get()->all();
        $aneis = Anel::get()->all();
        return view('cadastro.cadastro-linha', compact('onibus', 'linhas', 'aneis'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $linha = Linha::create($dados);
        $linha = Linha::find($linha->id);
        $linha->onibus()->attach($dados['onibus_id']);
        return view('registro-sucesso');
    }
}
