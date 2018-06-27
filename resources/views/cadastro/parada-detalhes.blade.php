@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')

<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Detalhes</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>{{ $a->nome }}</b></h1>
  <hr class="w3-round">
</div>

<ul>
    <li><b>Nome:</b> {{ $a->nome }}</li>
    <li><b>Código: </b> {{ $a->cod_identificacao }}</li>
    <li><b>Endereço Completo: </b> {{ $a->endereco_completo }}</li>
</ul>

<form class="w3-container" action="{{action('ParadaController@lista')}}" method="get">
    <button class="w3-btn w3-blue" id="btn-page" type="text">Voltar</button>
</form>


@stop