@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')

<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Detalhes</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Itinerário {{ $a->nome }}</b></h1>
  <hr class="w3-round">
</div>

<br>

<ul>
    <li><b>Nome:</b> {{ $a->nome }}</li>
    <li><b>Bairro: </b> {{ $a->bairro }}</li>
    <li><b>Município: </b> {{ $a->municipio }}
    <li><b>Linha: </b> {{ $a->linha_id }}
</ul>

<br>

@if (count($arrayLogradouros) == 0)
<div class="w3-container">
  <div class="error">Você não tem nenhum itinerário cadastrado</div>
</div>

<form class="w3-container" action="{{action('ItinerarioController@novo')}}" method="get">
    <button class="w3-btn w3-blue" id="btn-page" type="text">Voltar</button>
</form>

@else

<div class="w3-container">
    <b style="color:#C33C54;"> Logradouros presentes neste itinerário: </b>
    <br>
</div>

<table class="w3-table w3-bordered">

    <thead class="thead-dark">
        <tr> 
            <th scope="col">Nome</td>
            <th scope="col">Bairro</th>
            <th scope="col">Município</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($arrayLogradouros as $logradouro)
        <tr> 
            <td>{{ $logradouro['nome'] }}</td>
            <td>{{ $logradouro['bairro'] }}</td>
            <td>{{ $logradouro['municipio'] }}</td>
        </tr>
        @endforeach

    </tbody>
</table>

<form class="w3-container" action="{{action('ItinerarioController@lista')}}" method="get">
    <button class="w3-btn w3-blue" id="btn-page" type="text">Voltar</button>
</form>

@endif

@stop