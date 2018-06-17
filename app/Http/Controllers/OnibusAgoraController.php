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
    public function mostrarFormulario(Request $request)
    {
        $linhas = Linha::get()->all();

        foreach ($linhas as $linha) {

            //pegar o id dos onibus
            $linhaSelect = DB::table('linha_onibus')->select('onibus_id')->where('linha_id', '=', $linha->id)->get()->all();

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

            $somaTempoTotalDoTrajeto = 0;
            foreach($arrayParadas as $num => $values) {
                $somaTempoTotalDoTrajeto += $values[ 'tempo' ];
            }


            $primeiroIndexArrayParadas = key($arrayParadas);

            //inserir no banco as paradas iniciais de todas as linhas
            $insertTabelaLog = Log::updateOrCreate(
                ['id_parada' => $arrayParadas[$primeiroIndexArrayParadas]['id'],
                'nome' => $arrayParadas[$primeiroIndexArrayParadas]['nome'],
                'endereco_completo' => $arrayParadas[$primeiroIndexArrayParadas]['endereco_completo'],
                'onibus_nome' => $arrayOnibus[0]['nome'],
                'tempo' => $somaTempoTotalDoTrajeto]
            );
        }
        
        return view('negocio.onibus-agora', compact('linhas'));
    }







    public function store(Request $request)
    {
        $linhaRequest = $request->input('linha');

        //pegar o id dos onibus
        $linhaSelect = DB::table('linha_onibus')->select('onibus_id')->where('linha_id', '=', $linhaRequest)->get()->all();

        //pegar o onibus de cada linha e joga-los em um array
        $arrayOnibus = [];
        foreach ($linhaSelect as $onibusLinha) {
            $onibusSelect = DB::table('onibus')->where('id', '=', $onibusLinha->onibus_id)->get()->all();
            array_push($arrayOnibus, array("id" => $onibusSelect[0]->id, "nome" => $onibusSelect[0]->nome));
        }

        
        //pegar a parada atual de acordo com o nome do onibus
        $selectPegarParadaAtual = DB::table('logs')->orderBy('created_at', 'desc')->where('onibus_nome', '=', $arrayOnibus[0]['nome'])->get()->first();


        //insert terceira parada
        if ($selectPegarParadaAtual->id_parada == 2) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert quinta parada
        if ($selectPegarParadaAtual->id_parada == 4) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert setima parada
        if ($selectPegarParadaAtual->id_parada == 6) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //chegou na garagem
        if ($selectPegarParadaAtual->id_parada == 8) {

            // do nothing
        }

        //insert décima segunda
        if ($selectPegarParadaAtual->id_parada == 12) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert décima quarta
        if ($selectPegarParadaAtual->id_parada == 14) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert décima sexta
        if ($selectPegarParadaAtual->id_parada == 16) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //chegou na garagem
        if ($selectPegarParadaAtual->id_parada == 18) {

            //do nothing
        }

        session()->put('arrayOnibus', $arrayOnibus);

        return view('negocio.resultado-agora', compact('selectPegarParadaAtual'));

    }












    public function atualizarOnibus(Request $request)
    {
        $arrayOnibus = $request->session()->get('arrayOnibus'); 

        //pegar a parada atual de acordo com o nome do onibus
        $selectPegarParadaAtual = DB::table('logs')->orderBy('created_at', 'desc')->where('onibus_nome', '=', $arrayOnibus[0]['nome'])->get()->first();

         //insert segunda parada
         if ($selectPegarParadaAtual->id_parada == 1) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert quarta parada
        if ($selectPegarParadaAtual->id_parada == 3) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert sexta parada
        if ($selectPegarParadaAtual->id_parada == 5) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert oitava parada
        if ($selectPegarParadaAtual->id_parada == 7) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert décima primeira
        if ($selectPegarParadaAtual->id_parada == 11) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert décima terceira
        if ($selectPegarParadaAtual->id_parada == 13) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert décima quinta
        if ($selectPegarParadaAtual->id_parada == 15) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }

        //insert décima sétima
        if ($selectPegarParadaAtual->id_parada == 17) {

            $selectPegarProximaParada = DB::table('paradas')->where('id', '=', $selectPegarParadaAtual->id_parada +1)->get()->first();

            //insert nova parada
            $insertTabelaLog = Log::firstOrCreate(
            ['id_parada'=> $selectPegarProximaParada->id,
            'nome' => $selectPegarProximaParada->nome,
            'endereco_completo' => $selectPegarProximaParada->endereco_completo,
            'tempo' => $selectPegarParadaAtual->tempo - 10,
            'onibus_nome' => $arrayOnibus[0]['nome']
            ]);
        }
        
        $selectTabelaLog = DB::table('logs')->get()->all();
        
        return view('negocio.atualizar-onibus-agora', compact('selectPegarParadaAtual'));

    }
}