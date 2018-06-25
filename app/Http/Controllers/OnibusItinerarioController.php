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
    public function mostrarFormularioItinerario(Request $request)
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

        $paradas = Parada::get()->all();
        
        return view('negocio.onibus-itinerario', compact('linhas', 'paradas'));
    }

    public function localizarOnibusItinerario(Request $request)
    {
        $paradaRequest = $request->input('parada');
        $linhaRequest = $request->input('linha');

        //pegar o id dos onibus
        $linhaSelect = DB::table('onibus')->select('linha_id')->where('linha_id', '=', $linhaRequest)->get()->all();

        //pegar o onibus de cada linha e joga-los em um array
        $arrayOnibus = [];
        foreach ($linhaSelect as $key => $onibusLinha) {
            $onibusSelect = DB::table('onibus')->where('linha_id', '=', $onibusLinha->linha_id)->get()->all();
            array_push($arrayOnibus, array("id" => $onibusSelect[$key]->id, "nome" => $onibusSelect[$key]->nome));
        }

        //pegar as informações atuais de cada onibus na tabela de logs, mandar elas pra um array de nome arrayInformacoes, pra ele ser exibido na view
        $arrayInformacoes = [];
        foreach ($arrayOnibus as $key => $informacao) {
            $selectPegarParadaAtual = DB::table('logs')->orderBy('created_at', 'desc')->where('onibus_id', '=', $arrayOnibus[$key]['id'])->get()->first();
            array_push($arrayInformacoes, array(
                "id_parada" => $selectPegarParadaAtual->id_parada,
                "nome" => $selectPegarParadaAtual->nome, 
                "tempo" => $selectPegarParadaAtual->tempo,
                "endereco_completo" => $selectPegarParadaAtual->endereco_completo,
                "onibus_nome" => $selectPegarParadaAtual->onibus_nome)
            );
        }

        //pegar o itinerario da linha passando como parâmetro o request da linha
        $itinerarioSelect = DB::table('itinerarios')->where('linha_id', '=', $linhaRequest)->get()->all();
        
        //pegar todos os logradouros passando como parâmetro o id do itinerario
        $logradourosSelect = DB::table('itinerario_logradouro')->where('itinerario_id', '=', $itinerarioSelect[0]->id)->get()->all();
        
        //pegar os ids das paradas passando como parâmetro os ids dos logradouros e jogar essas informacoes no array abaixo
        $arrayParadas = [];

        foreach ($logradourosSelect as $paradasId) {
            $paradasIdSelect = DB::table('logradouro_parada')->where('logradouro_id', '=', $paradasId->logradouro_id)->get()->all();
        
            $paradasPresenteEmLinha = false;
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

        //lógica para checar se a parada que vem do request está presente na linha que também vem do request
        //caso não esteja presente, vai ser exibido uma mensagem de erro 

        $keys = [];
        for ($i = 0; $i < count($arrayParadas); $i++) {
            if (in_array($paradaRequest, $arrayParadas[$i])) {
                array_push($keys, $i);
            }
        }
        if (!empty($keys)) {

            $selectPegarParadaAtual = DB::table('logs')->orderBy('tempo', 'asc')->where('linha_id', '=', $linhaRequest)->get()->first();

            if ($paradaRequest > $selectPegarParadaAtual->id_parada) {

                $novoTempo = [];

                for ($i = $selectPegarParadaAtual->id_parada; $i < $paradaRequest; $i++) {
                    array_push($novoTempo, array(
                        "vezes" => $i
                    ));
                }

                $contadorNovoTempo = count($novoTempo) * 10;

                return view('negocio.resultado-itinerario', compact('selectPegarParadaAtual', 'contadorNovoTempo'));

            } elseif ($paradaRequest == $selectPegarParadaAtual->id_parada) {
                return view('negocio.resultado-itinerario-parada-igual');

            } elseif ($paradaRequest < $selectPegarParadaAtual->id_parada) {
                $arrayTempo = [80, 90, 100, 110];
                $somaNovoTempo = $arrayTempo[array_rand($arrayTempo)];

                return view('negocio.resultado-itinerario-tempo', compact('selectPegarParadaAtual', 'somaNovoTempo'));
            }

        } else {
            return view('negocio.erro-itinerario');
        }
    }

    //$informacao['id_parada'] = parada na qual o onibus está
    //$paradaRequest = parada onde o cliente está


    public function mostrarViewResultadoItinerario(Request $request)
    {
        $selectPegarParadaAtual = $request->session()->get('selectPegarParadaAtual');

        return view('negocio.resultado-itinerario', ['selectPegarParadaAtual' => $selectPegarParadaAtual]);
    }

    public function voltarParaConsultaItinerario(Request $request)
    {
        $linhas = Linha::get()->all();
        $paradas = Parada::get()->all();

        return redirect()->action(
            'OnibusItinerarioController@mostrarFormularioItinerario'
        );
    }
}
