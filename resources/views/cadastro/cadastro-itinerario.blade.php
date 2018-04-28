@extends('principal')

@section('titulo')

@stop

@section('conteudo')


<!-- Header -->
<div class="w3-container" style="margin-top:80px" id="showcase">
  <h1 class="w3-x-jumbo"><b>Cadastro</b></h1>
  <h1 class="w3-xxlarge w3-text-red" style="margin-top:-10px"><b>Itinerário</b></h1>
  <hr style="margin-top:-5px;width:50px;border:5px solid red" class="w3-round">
</div>

<form style="margin-top:15px" class="w3-container" action="/adiciona-cliente" method="post">
  <div style="margin-top:-5px" class="form-group">
    <label class="w3-text-red"><b>Nome</b></label>
    <input class="w3-input w3-border" type="text">
  </div>

  <div style="margin-top:10px" class="form-group">
    <label class="w3-text-red"><b>Tarifa</b></label>
    <input class="w3-input w3-border" type="text">
  </div>

  <button style="margin-top:20px" class="w3-btn w3-blue">Cadastrar</button>
</form>


@stop