<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parada;
use App\Models\Logradouro;

class OnibusTrajetoController extends Controller
{

    public function index()
    {
        
    }

    public function create()
    {
        $paradas = Parada::get()->all();
        return view('negocio.onibus-trajeto', compact('paradas'));
    }

    public function store(Request $request)
    {
        $paradaA = $request->input('paradaA');
        $paradaB = $request->input('paradaB');

        //pegar o id dos logradouros passando como parametro o id da parada
        $paradaA = DB::table('logradouro_parada')->select('logradouro_id')->where('parada_id', '=', $paradaA)->get()->all();
        $paradaB = DB::table('logradouro_parada')->select('logradouro_id')->where('parada_id', '=', $paradaB)->get()->all();

        //id dos logradouros
        echo ($paradaA[0]->logradouro_id);
        echo ($paradaB[0]->logradouro_id);

        //pegar id do itinerario passando como parametro o id do logradouro
        $pegarItinerarioA = DB::table('itinerario_logradouro')->where('id', '=', $paradaA[0]->logradouro_id)->get()->all();
        $pegarItinerarioB = DB::table('itinerario_logradouro')->where('id', '=', $paradaB[0]->logradouro_id)->get()->all();

        //id itinerario
        echo ($pegarItinerarioA[0]->itinerario_id);
        echo ($pegarItinerarioB[0]->itinerario_id);


        //pegar id da linha passando como parametro o id do itinerario
        $pegarNomeA = DB::table('itinerarios')->where('id', '=', $pegarItinerarioA[0]->itinerario_id)->get()->all();
        $pegarNomeB = DB::table('itinerarios')->where('id', '=', $pegarItinerarioB[0]->itinerario_id)->get()->all();

        //id linha
        echo ($pegarNomeA[0]->linha_id);
        echo ($pegarNomeB[0]->linha_id);

        //pegar o nome da linha passando como parametro o id da mesma
        $pegarItinerarioA = DB::table('linhas')->where('id', '=', $pegarNomeA[0]->linha_id)->get()->all();
        $pegarItinerarioB = DB::table('linhas')->where('id', '=', $pegarNomeB[0]->linha_id)->get()->all();

        if ($pegarItinerarioA[0]->nome == $pegarItinerarioB[0]->nome) {
            echo $pegarItinerarioA[0]->nome;
        } else {
            echo $pegarItinerarioA[0]->nome;
            echo $pegarItinerarioB[0]->nome;
        }

        //TO DO jogar os dados na tela
    }
}