<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;
use App\Models\Linha;
use App\Models\Itinerario;
use App\Models\Onibus;
use App\Models\Log;

class MovimentarOnibusController extends Controller
{
    public function mostrarFormularioMovimentar(Request $request) 
    {

        $onibus = Onibus::get()->all();

        return view('negocio.movimentar-onibus', compact('onibus'));
    }

    public function movimentarOnibus(Request $request)
    {
        $onibusRequest = $request->input('onibus');

        //pegar o id dos onibus
        $linhaSelect = DB::table('onibus')->select('linha_id')->where('linha_id', '=', $linhaRequest)->get()->all();

        //pegar o onibus de cada linha e joga-los em um array
        $arrayOnibus = [];
        foreach ($linhaSelect as $key => $onibusLinha) {
            $onibusSelect = DB::table('onibus')->where('linha_id', '=', $onibusLinha->linha_id)->get()->all();
            array_push($arrayOnibus, array("id" => $onibusSelect[$key]->id, "nome" => $onibusSelect[$key]->nome));
            print_r($onibusSelect[$key]->nome);
        }

        //pegar o itinerario da linha passando como parâmetro o request da linha
        $itinerarioSelect = DB::table('itinerarios')->where('linha_id', '=', $linhaRequest)->get()->all();

        //pegar todos os logradouros passando como parâmetro o id do itinerario
        $logradourosSelect = DB::table('itinerario_logradouro')->where('itinerario_id', '=', $itinerarioSelect[0]->id)->get()->all();

        //pegar os ids das paradas passando como parâmetro os ids dos logradouros e jogar essas informacoes no array abaixo
        $arrayParadas = [];
        foreach ($logradourosSelect as $paradasId) {
            $paradasIdSelect = DB::table('logradouro_parada')->where('logradouro_id', '=', $paradasId->logradouro_id)->get()->all();
        
            //pegar todas as paradas
            foreach ($paradasIdSelect as $paradas) {
                $paradasSelect = DB::table('paradas')->where('id', '=', $paradas->parada_id)->get()->all();
                array_push($arrayParadas, array(
                    "id" => $paradasSelect[0]->id, 
                    "nome" => $paradasSelect[0]->nome, 
                    "endereco_completo" => $paradasSelect[0]->endereco_completo,
                    "tempo" => 8)
                );
            }
        }

    }
}