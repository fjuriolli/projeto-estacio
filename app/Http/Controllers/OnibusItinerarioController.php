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

class OnibusItinerarioController extends Controller
{
    public function mostrarFormulario(Request $request)
    {
        $linhas = Linha::get()->all();

        foreach ($linhas as $linha) {

            //pegar o id dos onibus
            // $linhaSelect = DB::table('linha_onibus')->select('onibus_id')->where('linha_id', '=', $linha->id)->get()->all();
            $linhaSelect = DB::table('linhas')->select('onibus_id')->where('onibus_id', '=', $linha->id)->get()->all();


            $arrayOnibus = [];
            foreach ($linhaSelect as $onibusLinha) {
                $onibusSelect = DB::table('onibus')->where('id', '=', $onibusLinha->onibus_id)->get()->all();
                array_push($arrayOnibus, array("id" => $onibusSelect[0]->id, "nome" => $onibusSelect[0]->nome));
            }    
            //pegar o itinerario da linha passando como parâmetro o request da linha
            $itinerarioSelect = DB::table('itinerarios')->where('linha_id', '=', $linha->id)->get()->all();

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

            //pegando o tempo total do trajeto
            $somaTempoTotalDoTrajeto = 0;
            foreach($arrayParadas as $num => $values) {
                $somaTempoTotalDoTrajeto += $values[ 'tempo' ];
            }

            //inserir no banco as paradas iniciais de todas as linhas
            $primeiroIndexArrayParadas = key($arrayParadas);
            $insertTabelaLog = Log::updateOrCreate(
                ['id_parada' => $arrayParadas[$primeiroIndexArrayParadas]['id'],
                'nome' => $arrayParadas[$primeiroIndexArrayParadas]['nome'],
                'endereco_completo' => $arrayParadas[$primeiroIndexArrayParadas]['endereco_completo'],
                'onibus_nome' => $arrayOnibus[0]['nome'],
                'tempo' => $somaTempoTotalDoTrajeto]
            );
        }

        $paradas = Parada::get()->all();

        return view('negocio.onibus-itinerario', compact('linhas', 'paradas'));
    }

    public function andarOnibusItinerario(Request $request)
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
