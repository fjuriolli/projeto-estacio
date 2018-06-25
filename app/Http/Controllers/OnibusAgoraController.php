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

class OnibusAgoraController extends Controller
{
    //função com o objetivo de pegar todas as paradas iniciais de todas as linhas e salvá-las no banco de dados como a parada inicial
    public function mostrarFormularioAgora(Request $request)
    {
        $linhas = Linha::get()->all();

        foreach ($linhas as $linha) {

            //pegar o id dos onibus
            $linhaSelect = DB::table('onibus')->select('linha_id')->where('linha_id', '=', $linha->id)->get()->all();

            //pegar o onibus de cada linha e joga-los em um array
            $arrayOnibus = [];
            foreach ($linhaSelect as $key => $onibusLinha) {
                $onibusSelect = DB::table('onibus')->where('linha_id', '=', $onibusLinha->linha_id)->get()->all();
                array_push($arrayOnibus, array("id" => $onibusSelect[$key]->id, "nome" => $onibusSelect[$key]->nome, "linha_id" => $linha->id));
                // print_r($onibusSelect[$key]->nome);
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
        
        return view('negocio.onibus-agora', compact('linhas'));
    }

    public function localizarOnibusAgora(Request $request)
    {
        $linhaRequest = $request->input('linha');

        //pegar o id dos onibus
        $linhaSelect = DB::table('onibus')->select('linha_id')->where('linha_id', '=', $linhaRequest)->get()->all();

        //pegar o onibus de cada linha e joga-los em um array
        $arrayOnibus = [];
        foreach ($linhaSelect as $key => $onibusLinha) {
            $onibusSelect = DB::table('onibus')->where('linha_id', '=', $onibusLinha->linha_id)->get()->all();
            array_push($arrayOnibus, array("id" => $onibusSelect[$key]->id, "nome" => $onibusSelect[$key]->nome));
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
                    "tempo" => 10)
                );
            }
        }

        //pegar as informações atuais de cada onibus na tabela de logs, mandar elas pra um array de nome arrayInformacoes, pra ele ser exibido na view
        $arrayInformacoes = [];
        foreach ($arrayOnibus as $key => $informacao) {
            $selectPegarParadaAtual = DB::table('logs')->orderBy('created_at', 'desc')->where('onibus_id', '=', $arrayOnibus[$key]['id'])->get()->first();
            array_push($arrayInformacoes, array(
                "id_parada" => $selectPegarParadaAtual->id,
                "nome" => $selectPegarParadaAtual->nome, 
                "tempo" => $selectPegarParadaAtual->tempo,
                "endereco_completo" => $selectPegarParadaAtual->endereco_completo,
                "onibus_nome" => $selectPegarParadaAtual->onibus_nome)
            );
        }

        return view('negocio.resultado-agora', compact('selectPegarParadaAtual', 'arrayInformacoes'));
    }

    public function mostrarViewResultadoAgora(Request $request)
    {
        $selectPegarParadaAtual = $request->session()->get('selectPegarParadaAtual');

        return view('negocio.resultado-agora', ['selectPegarParadaAtual' => $selectPegarParadaAtual]);
    }

    public function voltarParaConsultaAgora(Request $request)
    {
        $linhas = Linha::get()->all();

        return redirect()->action(
            'OnibusAgoraController@mostrarFormularioAgora'
        );
    }
}