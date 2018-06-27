@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')


<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Cadastro</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Ônibus</b></h1>
  <hr class="w3-round">
</div>

<!-- Form -->
<div class="form-page">
  <form class="w3-container" action="/onibus/adiciona" method="post">

    <input name="_token" type="hidden" value=" {{ csrf_token() }} "/>

    <div class="form-group">
      <label class="w3-text"><b>Nome</b></label>
      <input name="nome" class="w3-input w3-border" type="text">
    </div>

    <div class="form-group">
      <label class="w3-text"><b>Marca</b></label>
      <input name="marca" class="w3-input w3-border" type="text">
    </div>

    <div class="form-parada">
    <label class="w3-text"><b>Selecione a Linha:</b></label>
    <div class="form-group-select">
      <div class="custom-select">
        <select name="linha_id">
        @foreach($linhas as $linha)
        <option value="{{ $linha->id }}">
        {{ $linha->nome }}</option>
        @endforeach
        </select>
      </div>
    </div>
  </div>

    <button class="w3-btn w3-blue" id="btn-page" type="submit">Cadastrar</button>
  </form>

  <div class="form-page">
    <form class="w3-containerBtt" action="{{ action('OnibusController@lista')}}" method="get">
      <button class="w3-btn w3-blue" id="btn-page2" type="submit">Listar</button>
    </form>
  </div>

</div>

<style>

.w3-containerBtt {
  position: relative;
  padding: 15px;
  bottom: 76px;
  left: 130px;
}

</style>

@stop