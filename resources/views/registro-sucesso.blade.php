@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')

<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Cadastro</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Logradouro</b></h1>
  <hr class="w3-round">
</div>

<div class="w3-container">
  <div style="margin-top: 15px;background-color: #E0F0D7" class="w3-panel w3-round-large">
    <h3 style="color: #457D46">Sucesso!</h3>
    <p style="color: #629361">Seu cadastro foi salvo.</p>
  </div>
</div>

@stop