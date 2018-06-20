@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')

<meta http-equiv="refresh" content="3"/>

<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Localizar Ônibus</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Controle de Frota</b></h1>
  <hr class="w3-round">
</div>

<br>

@if (Session::get('arrayNotasImportadasComSucesso')->tempo <= 10)
<div class="w3-container">
  <div style="margin-top: 15px;background-color: #E0F0D7" class="w3-panel w3-round-large">
    <h3 style="color: #457D46">Chegou!</h3>
    <p style="color: #629361">A porra do ônibus voltou para a garagem.</p>
  </div>
  <form class="w3-container" action="{{ action('OnibusAgoraController@voltarParaConsulta') }}" method="get">
    <button class="w3-btn w3-blue" id="btn-page" type="text">Voltar</button>
  </form>
</div>
@else
A linha selecionada contém os seguintes ônibus em trajeto:<br><br>

  <b>Parada Atual:</b> {{ session($selectPegarParadaAtual->nome) }}<br>
  <b>Endereço:</b> {{ session($selectPegarParadaAtual->endereco_completo) }}<br>
  <b>Onibus:</b> {{ session($selectPegarParadaAtual->onibus_nome) }}<br>
  <b>Previsão para voltar a garagem:</b> {{ session($selectPegarParadaAtual->tempo) }} minutos<br><br>

<form class="w3-container" action="{{ action('OnibusAgoraController@voltarParaConsulta') }}" method="get">
  <button class="w3-btn w3-blue" id="btn-page" type="text">Voltar</button>
</form>

@endif

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