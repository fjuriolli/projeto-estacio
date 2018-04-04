@extends('principal')

@section('titulo')

@stop

@section('conteudo')

<div class="container">
    <div class="cad-itinerario">
        <h3 class="titulo-itinerario"> Adicionar Itinerário </h3>
        <form action="/adiciona-cliente" method="post">

            <input name="_token" type="hidden" value=" {{ csrf_token() }}"/>

            <div class="form-group">
                <label>Trecho</label>
                <input name="trecho" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Logradouro</label>
                <input name="logradouro" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Bairro</label>
                <input name="bairro" class="form-control"/>
            </div>

            <div class="form-group">
                <label>Município</label>
                <input name="municipio" class="form-control"/>
            </div>

        <button class="btn btn-info" type="submit">Adicionar</button>

        </form>
    </div>
</div>

@stop