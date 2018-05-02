@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">
<link href="/css/multiselect.css" rel="stylesheet">

<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="jquery.multiSelect.js" type="text/javascript"></script>
<link href="jquery.multiSelect.css" rel="stylesheet" type="text/css" />

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
        <option value="4">SETÚBAL</option>
        <option value="4">VILA DO IPSEP</option>
        <option value="4">JORDÃO ALTO</option>
      </select>
    </div>

  <div class="multi-select">
    <label class="w3-text"><b>Selecione os Logradouros:</b></label>
    <div class="inside-select">
        <select id="" name="" multiple="multiple" size="7">
          <option value="option_1">Túnel da Abolição</option>
          <option value="option_2">Praça Agamenon Salazar</option>
          <option value="option_3">Rua Bruno Veloso</option>
          <option value="option_4">Rua da Aurora</option>
          <option value="option_5">Rua São Bento</option>
          <option value="option_6">Largo da Bica</option>
          <option value="option_7">Rua Macaíba</option>
          <option value="option_8">Rua Nova Morada</option>
          <option value="option_9">Praça Sete de Setembro</option>
          <option value="option_10">Largo de Água Fria</option>
        </select>
    </div>
</div>
    <button class="w3-btn w3-blue" id="btn-page" type="submit">Cadastrar</button>
  </form>
</div>

<!-- Padding -->
<div class="w3-light-grey w3-container w3-padding-24"><p class="w3-right">Powered by Wizzle &copy</p></div>

<script type="text/javascript">
			
	$(document).ready( function() {
	// Default options
	$("#control_1, #control_3, #control_4, #control_5").multiSelect();	
 });
			
</script>

@stop