@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')

<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Localizar</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Ônibus</b></h1>
  <hr class="w3-round">
</div>

<form class="w3-container" action="{{action('OnibusItinerarioController@mostrarFormularioItinerario')}}" method="get">
<br>
@if ( $linhaA == $linhaB )
  <b> As seguintes linhas passam pelo trajeto selecionado: </b></br></br>
  <b>Nome da Linha:</b> {{$nomeLinhaA}}<br>
  <b>Classificação:</b> {{$classificacaoLinhaA}}<br>
  <b>Anel:</b> {{$nomeAnelLinhaA}}<br>
  <b>Tarifa:</b> R$ {{$tarifaAnelLinhaA}}<br>

<br>
<b> Caso queira localizar uma linha específica, clique no botão abaixo </b>
<br>  
<button class="w3-btn w3-blue" id="btn-page" type="text">Localizar</button>
  

@else
  <b>As seguintes linhas passam pelo trajeto selecionado: </b></br></br>
  <b>• Nome da Linha:</b> {{$nomeLinhaA}}<br>
  <b>Classificação:</b> {{$classificacaoLinhaA}}<br>
  <b>Anel:</b> {{$nomeAnelLinhaA}}<br>
  <b>Tarifa:</b> R$ {{$tarifaAnelLinhaA}}<br>
  <br>
  <br>
  <b>• Nome da Linha:</b> {{$nomeLinhaB}}<br>
  <b>Classificação:</b> {{$classificacaoLinhaB}}<br>
  <b>Anel:</b> {{$nomeAnelLinhaB}}<br>
  <b>Tarifa:</b> R$ {{$tarifaAnelLinhaB}}<br>

  <br>
  <b> Caso queira localizar uma linha específica, clique no botão abaixo </b>
  <br>
  <button class="w3-btn w3-blue" id="btn-page" type="text">Localizar</button>

@endif
</form>

<style>
  
/* --------------- START OF HELP TIP --------------- */
.help-tip{
  position: relative;
  top: -347px;
  right: -135px;
  text-align: center;
  background-color: #BCDBEA;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  font-size: 14px;
  line-height: 26px;
  cursor: default;
}

.help-tip:before{
  content:'?';
  font-weight: bold;
  color:#fff;
}

.help-tip:hover p{
  display:block;
  transform-origin: 100% 0%;

  -webkit-animation: fadeIn 0.3s ease-in-out;
  animation: fadeIn 0.3s ease-in-out;

}

.help-tip p{    /* The tooltip */
  display: none;
  text-align: left;
  background-color: #1E2021;
  padding: 20px;
  width: 300px;
  position: absolute;
  border-radius: 3px;
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
  right: -4px;
  color: #FFF;
  font-size: 13px;
  line-height: 1.4;
}

.help-tip p:before{ /* The pointer of the tooltip */
  position: absolute;
  content: '';
  width:0;
  height: 0;
  border:6px solid transparent;
  border-bottom-color:#1E2021;
  right:10px;
  top:-12px;
}

.help-tip p:after{ /* Prevents the tooltip from being hidden */
  width:100%;
  height:40px;
  content:'';
  position: absolute;
  top:-40px;
  left:0;
}

.help-tip:hover p{
  display:block;
  transform-origin: 100% 0%;
  
  -webkit-animation: fadeIn 0.3s ease-in-out;
  animation: fadeIn 0.3s ease-in-out;
      z-index: 999;
  }

/* CSS animation */

@-webkit-keyframes fadeIn {
  0% { 
      opacity:0; 
      transform: scale(0.6);
  }

  100% {
      opacity:100%;
      transform: scale(1);
  }
}

@keyframes fadeIn {
  0% { opacity:0; }
  100% { opacity:100%; }
}

/* --------------- END OF HELP TIP --------------- */
</style>

@stop