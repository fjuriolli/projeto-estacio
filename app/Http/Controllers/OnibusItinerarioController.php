<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;
use App\Models\Linha;
use App\Models\Itinerario;
use App\Models\Onibus;

class OnibusItinerarioController extends Controller
{
    public function create()
    {
        $linhas = Linha::get()->all();
        $paradas = Parada::get()->all();
        return view('negocio.onibus-itinerario', compact('linhas', 'paradas'));
    }

    public function store(Request $request)
    {
        $parada = $request->input('parada');
        $linha = $request->input('linha');

        //pegar o id dos onibus
        $linhaSelect = DB::table('linha_onibus')->select('onibus_id')->where('linha_id', '=', $linha)->get()->all();

        $arrayOnibus = [];
        foreach ($linhaSelect as $onibusLinha) {
            $onibusSelect = DB::table('onibus')->where('id', '=', $onibusLinha->onibus_id)->get()->all();
            array_push($arrayOnibus, array("id" => $onibusSelect[0]->id, "nome" => $onibusSelect[0]->nome));
        }

        return view('negocio.resultado-itinerario', compact('arrayOnibus'));
    }
}
