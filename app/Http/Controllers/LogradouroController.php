<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;

class LogradouroController extends Controller
{
    public function create()
    {
        // $paradas = Parada::get()->all();
        // $logradouros = Logradouro::get()->all();
        // foreach ($logradouros as $logradouro) {
        //     echo($logradouro['nome']);
        //     echo($logradouro['bairro']);
        //     echo($logradouro['municipio']);
        //     echo "<br>";
           
        // }

        // $paradas = Logradouro::find(2)->paradas()->orderBy('nome')->get();
        // dd($paradas);
        // die;

        //$logradouros = Logradouro::get()->all();
        // foreach ($logradouros->paradas as $parada) {
        //     echo($parada);
        // }

        // $query = DB::table('logradouro_parada')->select('parada_id')->where('logradouro_id', '=', 1)->get();
        // dd($query);

        //pegar os itinerarios
        $itinerarioUm = DB::table('itinerario_logradouro')->where('itinerario_id', '=', 1)->get()->all();
        $itinerarioDois = DB::table('itinerario_logradouro')->where('itinerario_id', '=', 2)->get()->all();

        echo ("Itinerario Um");
        echo ("<br>");
        foreach ($itinerarioUm as $um) {
            $arrayParadas = [];
            $paradas = DB::table('logradouro_parada')->where('logradouro_id', '=', $um->logradouro_id)->get()->all();
            foreach ($paradas as $parada) {
                echo $parada->parada_id;
            }
            die;
            echo ($um->logradouro_id);
            echo ("<br>");
        }

        echo ("Itinerario Dois");
        echo ("<br>");
        foreach ($itinerarioDois as $dois) {
            echo ($dois->logradouro_id);
            echo ("<br>");
        }die;

        

        // $paradas = Parada::get()->all();
        $paradas = Logradouro::find(2)->paradas()->orderBy('nome')->get();
        // $paradas = Logradouro::where('id', '=', 1)->paradas()->orderBy('nome')->get();
        // dd($paradas);
        foreach ($paradas as $parada) {
            echo($parada);
        }

        die;
        return view('cadastro.cadastro-logradouro', compact('paradas', 'logradouros'));
    }


    public function store(Request $request)
    {
        $dados = $request->all();
        $logradouro = Logradouro::create($dados);
        $logradouro = Logradouro::find($logradouro->id);
        $logradouro->paradas()->attach($dados['parada_id']);
        return view('registro-sucesso');
    }
}
