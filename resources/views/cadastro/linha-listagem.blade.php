@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

@stop

@section('conteudo')

<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Listagem</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Linhas</b></h1>
  <hr class="w3-round">
</div>

@if (count($linhas) == 0)
<div class="w3-container">
  <div class="error">Você não tem nenhuma linha cadastrada</div>
</div>

<form class="w3-container" action="{{action('LinhaController@novo')}}" method="get">
    <button class="w3-btn w3-blue" id="btn-page" type="text">Voltar</button>
</form>

@else

<table class="w3-table w3-bordered">

    <thead class="thead-dark">
        <tr> 
            <th scope="col">Nome</td>
            <th scope="col">Classificação</th>
            <th scope="col">Anel</th>
            <th scope="col">Detalhes</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($linhas as $a)
        <tr> 
            <td>{{ $a->nome }}</td>
            <td>{{ $a->classificacao }}</td>
            <td>{{ $a->anel_id }}</td>
            <td><a href="/linhas/mostra/{{$a->id}}"><i class="material-icons">search</i></a></td>
            <td><a href="/linhas/remove/{{$a->id}}"><i class="material-icons">delete</i></a></td>
        </tr>
        @endforeach

    </tbody>
</table>

<form class="w3-container" action="{{action('LinhaController@novo')}}" method="get">
    <button class="w3-btn w3-blue" id="btn-page" type="text">Voltar</button>
</form>

@endif

@stop