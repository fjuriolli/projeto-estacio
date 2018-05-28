<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;
use App\Models\Linha;
use App\Models\Itinerario;
use App\Models\Onibus;

class OnibusAgoraController extends Controller
{
    public function create()
    {
        $linhas = Linha::get()->all();
        return view('negocio.onibus-agora', compact('linhas'));
    }

    public function store(Request $request)
    {
        $linhaRequest = $request->input('linha');

        //pegar o id dos onibus
        $linhaSelect = DB::table('linha_onibus')->select('onibus_id')->where('linha_id', '=', $linhaRequest)->get()->all();

        // dd($linhaSelect); onibus id 3 e 4
        //foreach para pegar as informações dos onibus de cada linha
        foreach ($linhaSelect as $linha) {
            $onibusSelect = DB::table('onibus')->where('id', '=', $linha->onibus_id)->get()->all();
            echo ($onibusSelect[0]->id);
            echo ($onibusSelect[0]->nome);
        }

        //converter o id da linha que veio no request para int
        $linhaInt = intval($linhaRequest);

        //pegar o itinerario da linha passando como parâmetro o request da linha
        $itinerarioSelect = DB::table('itinerarios')->where('linha_id', '=', $linhaInt)->get()->all();
        
        echo ($itinerarioSelect[0]->id);
        echo ($itinerarioSelect[0]->linha_id);
        echo ($itinerarioSelect[0]->nome);
        echo ($itinerarioSelect[0]->bairro);

        //pegar todos os logradouros passando como parâmetro o id do itinerario
        $logradourosSelect = DB::table('itinerario_logradouro')->where('itinerario_id', '=', $itinerarioSelect[0]->id)->get()->all();

        //pegar os ids das paradas passando como parâmetro os ids dos logradouros e jogar essas informacoes no array abaixo
        $arrayParadas = [];
        foreach ($logradourosSelect as $paradasId) {
            $paradasIdSelect = DB::table('logradouro_parada')->where('logradouro_id', '=', $paradasId->logradouro_id)->get()->all();
        
            //pegar todas as paradas
            foreach ($paradasIdSelect as $paradas) {
                $paradasSelect = DB::table('paradas')->where('id', '=', $paradas->parada_id)->get()->all();

                array_push($arrayParadas, array("id" => $paradasSelect[0]->id, "nome" => $paradasSelect[0]->nome, "endereco_completo" => $paradasSelect[0]->endereco_completo  ));

                $onibusSelect = DB::table('onibus')->get()->all();

                dd($onibusSelect);
            
            }
        }
        dd($arrayParadas);
        
    }
}