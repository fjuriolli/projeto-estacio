@extends('principal')

@section('titulo')

@stop

@section('conteudo')

<div class="container">
    <div class="cad-itinerario">
        <h3 class="titulo-itinerario"> Adicionar Parada </h3>
        <form action="/adiciona-cliente" method="post">

            <input name="_token" type="hidden" value=" {{ csrf_token() }}"/>

            <div class="form-group">
                <label>Nome</label>
                <input name="nome" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Endereço</label>
                <input name="endereco" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Referência</label>
                <input name="referencia" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Tipo Parada</label>
                <input name="tipo" class="form-control"/>
            </div>

        <button class="btn btn-info" type="submit">Adicionar</button>

        </form>
    </div>
</div>

@stop