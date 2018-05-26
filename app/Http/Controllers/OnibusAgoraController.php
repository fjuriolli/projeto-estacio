<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;
use App\Models\Linha;
use App\Models\Itinerario;

class OnibusAgoraController extends Controller
{
    public function create()
    {
        $linhas = Linha::get()->all();
        return view('negocio.onibus-agora', compact('linhas'));
    }

    public function store(Request $request)
    {
        $linha = $request->input('linha');

        //pegar o id dos onibus
        $linhaSelect = DB::table('linha_onibus')->select('onibus_id')->where('linha_id', '=', $linha)->get()->all();

        //foreach para pegar as informações dos onibus de cada linha
        foreach ($linhaSelect as $linha) {
            $onibusSelect = DB::table('onibus')->where('id', '=', $linha->onibus_id)->get()->all();
            echo ($onibusSelect[0]->id);
            echo ($onibusSelect[0]->nome);
        }
    }
}