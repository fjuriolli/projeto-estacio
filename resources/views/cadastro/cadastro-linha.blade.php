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
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Linha</b></h1>
  <hr class="w3-round">
</div>

<!-- Form -->
<div class="form-page">
  <form class="w3-container" action="/adiciona-itinerario" method="post">

  <input name="_token" type="hidden" value=" {{ csrf_token() }} "/>

  <div class="form-group">
    <label class="w3-text"><b>Nome</b></label>
    <input name="nome" class="w3-input w3-border w3-animate-input" type="text">
  </div>

  <div class="form-group">
    <label class="w3-text"><b>Ônibus que fazem parte desta Linha:</b></label>
    <input name="qtd_onibus" class="w3-input w3-border w3-animate-input" type="text">
  </div>

  <div class="form-group">
    <label class="w3-text"><b>Classificação</b></label>
    <input name="classificacao" class="w3-input w3-border w3-animate-input" type="text">
  </div>

  <div class="multi-select">
  <label class="w3-text"><b>Selecione os Ônibus que fazem parte desta Linha:</b></label>
  <div class="inside-select">
    <select id="control_1" name="control_1[]" multiple="multiple" size="5">
    <option value="0">Ônibus 1</option>
    <option value="1">Ônibus 2</option>
    <option value="2">Ônibus 3</option>
    <option value="3">Ônibus 4</option>
    <option value="4">Ônibus 5</option>
    <option value="5">Ônibus 6</option>
    <option value="6">Ônibus 7</option>
    </select>
  </div>
</div>

  <div class="form-parada">
    <label class="w3-text"><b>Selecione o Anel</b></label>
    <div class="form-group-select">
      <div class="custom-select">
        <select>
        <option value="0">A - R$3,20</option>
        <option value="1">B - R$4,40</option>
        <option value="2">D - R$3,45</option>
        <option value="3">G - R$2,10</option>
        </select>
      </div>
    </div>
  </div>

  <button class="w3-btn w3-blue" id="btn-page" type="submit">Cadastrar</button>
  </form>
</div>



<script type="text/javascript">
			
	$(document).ready( function() {
	// Default options
	$("#control_1, #control_3, #control_4, #control_5").multiSelect();	
 });
			
</script>

@stop