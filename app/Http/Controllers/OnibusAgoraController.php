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
    public function mostrarFormulario()
    {
        $linhas = Linha::get()->all();
        return view('negocio.onibus-agora', compact('linhas'));
    }

    public function store(Request $request)
    {
        $linhaRequest = $request->input('linha');

        //pegar o id dos onibus
        $linhaSelect = DB::table('linha_onibus')->select('onibus_id')->where('linha_id', '=', $linhaRequest)->get()->all();

        $arrayOnibus = [];
        foreach ($linhaSelect as $onibusLinha) {
            $onibusSelect = DB::table('onibus')->where('id', '=', $onibusLinha->onibus_id)->get()->all();
            array_push($arrayOnibus, array("id" => $onibusSelect[0]->id, "nome" => $onibusSelect[0]->nome));
        }

        //converter o id da linha que veio no request para int
        $linhaInt = intval($linhaRequest);

        //pegar o itinerario da linha passando como parâmetro o request da linha
        $itinerarioSelect = DB::table('itinerarios')->where('linha_id', '=', $linhaInt)->get()->all();

        //pegar todos os logradouros passando como parâmetro o id do itinerario
        $logradourosSelect = DB::table('itinerario_logradouro')->where('itinerario_id', '=', $itinerarioSelect[0]->id)->get()->all();

        //pegar os ids das paradas passando como parâmetro os ids dos logradouros e jogar essas informacoes no array abaixo
        $arrayParadas = [];
        foreach ($logradourosSelect as $paradasId) {
            $paradasIdSelect = DB::table('logradouro_parada')->where('logradouro_id', '=', $paradasId->logradouro_id)->get()->all();
        
            //pegar todas as paradas
            foreach ($paradasIdSelect as $paradas) {
                $paradasSelect = DB::table('paradas')->where('id', '=', $paradas->parada_id)->get()->all();

                array_push($arrayParadas, array("id" => $paradasSelect[0]->id, "nome" => $paradasSelect[0]->nome, "endereco_completo" => $paradasSelect[0]->endereco_completo, "tempo" => rand(4, 9)));
            }
        }

        $somaTempoTotalDoTrajeto = 0;
        foreach($arrayParadas as $num => $values) {
            $somaTempoTotalDoTrajeto += $values[ 'tempo' ];
        }

        //limpar a tabela antes do insert para não ter duplicidade
        DB::table('logs')->truncate();

        foreach ($arrayOnibus as $onibus) {
            $insertTabelaLog = DB::table('logs')->insert(
                ['id_parada' => $arrayParadas[0]['id'],
                 'nome' => $arrayParadas[0]['nome'],
                 'endereco_completo' => $arrayParadas[0]['endereco_completo'],
                 'tempo' => $somaTempoTotalDoTrajeto,
                 'onibus_id' => $onibus['id'],
                 'onibus_nome' => $onibus['nome']
                 ]
            );
        }
        //testar insert na tela de log
        $selectTabelaLog = DB::table('logs')->get()->all();
        // dd($selectTabelaLog);

        return view('negocio.resultado-agora', compact('selectTabelaLog'));
        
    }

    public function voltarPagina() {
        return redirect()->route('/onibus-agora');
    }

    public function atualizarOnibus(Request $request)
    {
        return view('negocio.atualizar-onibus-agora');
    }
}