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

        //pegar id do itinerario passando como parametro o id do logradouro
        $pegarItinerarioA = DB::table('itinerario_logradouro')->where('id', '=', $paradaA[0]->logradouro_id)->get()->all();
        $pegarItinerarioB = DB::table('itinerario_logradouro')->where('id', '=', $paradaB[0]->logradouro_id)->get()->all();

        //pegar id da linha passando como parametro o id do itinerario
        $pegarNomeA = DB::table('itinerarios')->where('id', '=', $pegarItinerarioA[0]->itinerario_id)->get()->all();
        $pegarNomeB = DB::table('itinerarios')->where('id', '=', $pegarItinerarioB[0]->itinerario_id)->get()->all();

        //pegar o nome da linha passando como parametro o id da mesma
        $pegarLinhaA = DB::table('linhas')->where('id', '=', $pegarNomeA[0]->linha_id)->get()->all();
        $pegarLinhaB = DB::table('linhas')->where('id', '=', $pegarNomeB[0]->linha_id)->get()->all();

        $linhaA = $pegarLinhaA[0]->nome;
        $linhaB = $pegarLinhaB[0]->nome;


        $pegarItinerarioA = DB::table('itinerarios')->where('id', '=', $pegarLinhaA[0]->id)->get()->all();
        $pegarItinerarioB = DB::table('itinerarios')->where('id', '=', $pegarLinhaB[0]->id)->get()->all();

        $pegarIdsLogradourosA = DB::table('itinerario_logradouro')->where('itinerario_id', '=', $pegarItinerarioA[0]->id)->get()->all();
        $pegarIdsLogradourosB = DB::table('itinerario_logradouro')->where('itinerario_id', '=', $pegarItinerarioB[0]->id)->get()->all();

        $arrayLogradourosA = [];
        foreach ($pegarIdsLogradourosA as $logradouro) {
            $pegarLogradourosA = DB::table('logradouros')->where('id', '=', $logradouro->logradouro_id)->get()->all();
            array_push($arrayLogradourosA, array("id" => $pegarLogradourosA[0]->id, "nome" => $pegarLogradourosA[0]->nome, "bairro" => $pegarLogradourosA[0]->bairro, "municipio" => $pegarLogradourosA[0]->municipio));
        }

        $arrayLogradourosB = [];
        foreach ($pegarIdsLogradourosB as $logradouro) {
            $pegarLogradourosB = DB::table('logradouros')->where('id', '=', $logradouro->logradouro_id)->get()->all();
            // dd($pegarLogradourosB[0]->id);
            array_push($arrayLogradourosB, array("id" => $pegarLogradourosB[0]->id, "nome" => $pegarLogradourosB[0]->nome, "bairro" => $pegarLogradourosB[0]->bairro, "municipio" => $pegarLogradourosB[0]->municipio));
        }
        
        return view('negocio.resultado-trajeto', compact('linhaA', 'linhaB'));
        return $this->detalhesa($arrayLogradourosA, $arrayLogradourosB);
        
    }

    public function detalhesa($arrayLogradourosA, $arrayLogradourosB) {
        return view('negocio.detalhes-trajetoa', compact('arrayLogradourosA', 'arrayLogradourosB'));
    }
}