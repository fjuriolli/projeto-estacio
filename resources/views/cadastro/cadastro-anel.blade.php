@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')


<!-- Header -->
<div class="w3-container container-anel" id="showcase">
  <h1 class="w3-x-jumbo"><b>Cadastro</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-anel"><b>Anel</b></h1>
  <hr class="w3-round">
</div>

<div class="form-anel">
  <form class="w3-container" action="/adiciona-cliente" method="post">
    <div class="form-group">
      <label class="w3-text"><b>Nome</b></label>
      <input class="w3-input w3-border w3-animate-input" type="text">
    </div>

    <div class="form-group">
      <label class="w3-text"><b>Tarifa</b></label>
      <input class="w3-input w3-border w3-animate-input" type="text">
    </div>

    <button class="w3-btn" id="btn-anel">Cadastrar</button>
  </form>
</div>

<div class="w3-light-grey w3-container w3-padding-24"><p class="w3-right">Powered by Wizzle™</p></div>

@stop