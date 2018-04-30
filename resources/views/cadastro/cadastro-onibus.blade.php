@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">
<link href="/css/multiselect.css" rel="stylesheet">

@stop

@section('conteudo')


<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Cadastro</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Itinerário</b></h1>
  <hr class="w3-round">
</div>

<!-- Form -->
<div class="form-page">
  <form class="w3-container" action="/adiciona-itinerario" method="post">

    <input name="_token" type="hidden" value=" {{ csrf_token() }}"/>

    <div class="form-group">
      <label class="w3-text"><b>Nome</b></label>
      <input name="nome" class="w3-input w3-border w3-animate-input" type="text">
    </div>

    <div class="form-group">
      <label class="w3-text"><b>Bairro</b></label>
      <input name="bairro" class="w3-input w3-border w3-animate-input" type="text">
    </div>

    <div class="form-group">
      <label class="w3-text"><b>Município</b></label>
      <input name="municipio" class="w3-input w3-border w3-animate-input" type="text">
    </div>

    <div class="custom-select" style="width:200px;">
      <label class="w3-text"><b>Seleciona a Linha:</b></label>
      <select>
        <option value="0">AEROPORTO</option>
        <option value="1">AEROPORTO (OPCIONAL)</option>
        <option value="2">AGUAS COMPRIDAS</option>
        <option value="3">BRASILIA TEIMOSA</option>
        <option value="4">MANGUEIRA</option>
    </select>
    </div>

    <button class="w3-btn w3-blue" id="btn-page" type="submit">Cadastrar</button>
  </form>
</div>

<!-- Padding -->
<div class="w3-light-grey w3-container w3-padding-24"><p class="w3-right">Powered by Wizzle &copy</p></div>

<script>


@stop