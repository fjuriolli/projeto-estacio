@extends('principal')

@section('titulo')

@stop

@section('conteudo')

<div class="container">
    <div class="cad-itinerario">
        <h3 class="titulo-itinerario"> Adicionar Linha </h3>
        <form action="/adiciona-cliente" method="post">

            <input name="_token" type="hidden" value=" {{ csrf_token() }}"/>

            <div class="form-group">
                <label>Nome</label>
                <input name="nome" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Anel</label>
                <input name="anel" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Quantidade de Ônibus</label>
                <input name="onibus" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Ponto de Início</label>
                <input name="inicio" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Ponto de Retorno</label>
                <input name="retorno" class="form-control"/>
            </div>

        <button class="btn btn-info" type="submit">Adicionar</button>

        </form>
    </div>
</div>

@stop