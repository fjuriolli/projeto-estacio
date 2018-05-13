<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Onibus;

class OnibusController extends Controller
{
    public function create()
    {
        $onibus = Onibus::get()->all();
        return view('cadastro.cadastro-onibus', compact('onibus'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        Onibus::create($dados);
        return view('registro-sucesso');
    }
}
