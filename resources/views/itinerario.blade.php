@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

<title>Cadastro Linha</title>

@stop

@section('conteudo')

<div class="container">
    <div class="formulario">    
    <form>
    
        <div class="form-row align-items-center">
            <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Parada Inicial</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Escolha...</option>
                <option value="1">Parada 1</option>
                <option value="2">Parada 2</option>
                <option value="3">Parada 3</option>
                <option value="3">Parada 4</option>
                <option value="3">Parada 5</option>
            </select>
            </div>

            <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Parada Final</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Escolha...</option>
                <option value="1">Parada 1</option>
                <option value="2">Parada 2</option>
                <option value="3">Parada 3</option>
                <option value="3">Parada 4</option>
                <option value="3">Parada 5</option>
            </select>
            </div>
        </div>
    </form>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1">
            Horário de Pico
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Confirmar</button>


</div>
</div>

@stop