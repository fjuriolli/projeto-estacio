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

        $linhas = Linha::get()->all();
        $onibusTodos = Onibus::get()->all();

        foreach ($linhas as $linha) {

            //pegar o id dos onibus
            $linhaSelect = DB::table('onibus')->select('linha_id')->where('linha_id', '=', $linha->id)->get()->all();

            //pegar o onibus de cada linha e joga-los em um array
            $arrayOnibus = [];
            foreach ($linhaSelect as $key => $onibusLinha) {
                $onibusSelect = DB::table('onibus')->where('linha_id', '=', $onibusLinha->linha_id)->get()->all();
                array_push($arrayOnibus, array("id" => $onibusSelect[$key]->id, "nome" => $onibusSelect[$key]->nome, "linha_id" => $linha->id));
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
                        "tempo" => 10)
                    );
                }
            }

            //pegando o tempo total do trajeto
            $somaTempoTotalDoTrajeto = 0;
            foreach($arrayParadas as $num => $values) {
                $somaTempoTotalDoTrajeto += $values[ 'tempo' ];
            }

            foreach ($arrayOnibus as $key => $onibus) {
                //inserir no banco as paradas iniciais de todas as linhas
                $primeiroIndexArrayParadas = key($arrayParadas);
                $insertTabelaLog = Log::updateOrCreate(
                    ['id_parada' => $arrayParadas[$primeiroIndexArrayParadas]['id'],
                    'nome' => $arrayParadas[$primeiroIndexArrayParadas]['nome'],
                    'endereco_completo' => $arrayParadas[$primeiroIndexArrayParadas]['endereco_completo'],
                    'onibus_nome' => $arrayOnibus[$key]['nome'],
                    'onibus_id' => $arrayOnibus[$key]['id'],
                    'tempo' => $somaTempoTotalDoTrajeto,
                    'linha_id' => $arrayOnibus[$key]['linha_id']]
                );
            }
        }

        return view('negocio.movimentar-onibus', compact('onibusTodos'));
    }

    public function movimentarOnibus(Request $request)
    {
        $onibusId = $request->input('onibus');

        //pegar o id dos onibus
        $linhaSelect = DB::table('onibus')->where('id', '=',  $onibusId)->get()->first();

        $pegarIdLinha = DB::table('onibus')->select('linha_id')->where('id', '=', $onibusId)->get()->first();

        //pegar o itinerario da linha passando como parâmetro o request da linha
        $itinerarioSelect = DB::table('itinerarios')->where('linha_id', '=', $pegarIdLinha->linha_id)->get()->all();

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
                    "tempo" => 10)
                );
            }
        }

        //pegar a parada atual de acordo com o nome do onibus
        $selectPegarParadaAtual = DB::table('logs')->orderBy('created_at', 'desc')->where('onibus_id', '=', $onibusId)->get()->first();

        //pegar a proxima parada
        $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

        //checar se o onibus ja chegou na garagem, caso positivo, parar de inserir no banco de dados a movimentação do mesmo
        if ($selectPegarParadaAtual->tempo == 10) {
            //do nothing
        } else {
            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
                ['id_parada'=> $selectPegarProximaParada->id,
                'nome' => $selectPegarProximaParada->nome,
                'endereco_completo' => $selectPegarProximaParada->endereco_completo,
                'tempo' => $selectPegarParadaAtual->tempo - 10,
                'onibus_nome' => $linhaSelect->nome,
                'onibus_id' => $linhaSelect->id,
                'linha_id' => $selectPegarParadaAtual->linha_id
                ]);
        }

        $request->session()->flash('selectPegarParadaAtual', $selectPegarParadaAtual);

        return redirect()->action('MovimentarOnibusController@mostrarViewResultadoMovimentar');
    }

    public function mostrarViewResultadoMovimentar(Request $request)
    {
        $selectPegarParadaAtual = $request->session()->get('selectPegarParadaAtual');

        return view('negocio.resultado-movimentar');
    }

    public function voltarParaConsultaMovimentar(Request $request)
    {
        $linhas = Linha::get()->all();
        $onibus = Onibus::get()->all();

        return redirect()->action(
            'MovimentarOnibusController@mostrarFormularioMovimentar'
        );
    }
}