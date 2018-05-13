<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anel;

class AnelController extends Controller
{
    public function create()
    {
        $aneis = Anel::get()->all();
        return view('cadastro.cadastro-anel', compact('aneis'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        Anel::create($dados);
        return view('registro-sucesso');
    }
}
