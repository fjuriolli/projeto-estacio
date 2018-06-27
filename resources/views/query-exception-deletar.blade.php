@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')

<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Erro!</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Falha ao deletar</b></h1>
  <hr class="w3-round">
</div>

<div class="w3-container">
  <div class="error">Erro! Você não pode deletar este item. Ele está sendo usado em outros relacionamentos.</div>
</div>

<style>

.info, .success, .warning, .error, .validation {
  border: 1px solid;
  margin: 10px 0px;
  padding: 15px 10px 15px 50px;
  background-repeat: no-repeat;
  background-position: 10px center;
}

.success {
  color: #4F8A10;
  background-color: #DFF2BF;
  background-image: url("/images/ok.png");
}

.error {
  color: #D8000C;
  background-color: #FFBABA;
  background-image:  url("/images/cancel.png");
}

</style>

@stop