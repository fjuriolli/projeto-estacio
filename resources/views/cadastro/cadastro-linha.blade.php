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
  <form class="w3-container" action="{{route ('linha.store')}}" method="post">

  <input name="_token" type="hidden" value=" {{ csrf_token() }} "/>

  <div class="form-group">
    <label class="w3-text"><b>Nome</b></label>
    <input name="nome" class="w3-input w3-border" type="text">
  </div>

  <div class="form-group">
    <label class="w3-text"><b>Classificação</b></label>
    <input name="classificacao" class="w3-input w3-border" type="text">
  </div>

  <div class="multi-select">
    <label for="onibus_id" class="w3-text"><b>Selecione os Ônibus que fazem parte desta Linha:</b></label>
    <div class="inside-select">
      <select name="onibus_id[]" multiple="multiple" size="5">
      @foreach($onibus as $onibus)
      <option value="{{ $onibus->id }}">
        {{ $onibus->nome }}</option> 
      @endforeach
      </select>
    </div>
  </div>

  <div class="form-parada">
    <label class="w3-text"><b>Selecione o Anel</b></label>
    <div class="form-group-select">
      <div class="custom-select">
        <select name="anel_id">
        @foreach($aneis as $anel)
        <option value="{{ $anel->id }}">
        {{ $anel->nome }}</option>
        @endforeach
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