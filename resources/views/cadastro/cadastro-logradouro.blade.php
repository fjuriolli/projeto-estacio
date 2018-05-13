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

<!-- Form -->
<div class="form-page">
  <form class="w3-container" action="/adiciona-logradouro" method="post">

  <input name="_token" type="hidden" value=" {{ csrf_token() }} "/>

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

  <div class="multi-select">
    <label class="w3-text"><b>Selecione as Paradas que fazem parte deste Logradouro:</b></label>
    <div class="inside-select">
      <select id="control_1" name="control_1[]" multiple="multiple" size="5">
      <option value="0">010089 - Jequitinhonha - Boa Viagem</option>
      <option value="1">010056 - Domingos Ferreira - Pina</option>
      <option value="2">010043 - Jacy - Imbiribeira</option>
      <option value="3">010078 - Domingos Ferreira - Boa Viagem</option>
      <option value="4">010001 - Herculano Bandeira - Pina</option>
      <option value="5">010012 - Castelo Branco - Candeias</option>
      <option value="6">010023 - Morais - Pina</option>
      <option value="7">010001 - Herculano Bandeira - Pina</option>
      <option value="8">010012 - Castelo Branco - Candeias</option>
      <option value="9">010023 - Morais - Pina</option>
      <option value="10">010089 - Jequitinhonha - Boa Viagem</option>
      <option value="11">010056 - Domingos Ferreira - Pina</option>
      <option value="12">010043 - Jacy - Imbiribeira</option>
      </select>
    </div>
  </div>

    <button class="w3-btn w3-blue" id="btn-page" type="submit">Cadastrar</button>
  </form>
</div>

<!-- Padding -->
<div class="w3-light-grey w3-container w3-padding-24"><p class="w3-right">Powered by Wizzle &copy</p></div>

@stop