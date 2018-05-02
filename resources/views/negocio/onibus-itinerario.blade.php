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

<!-- Form -->
<div class="form-page">
  <form class="w3-container" action="/adiciona-anel" method="post">

  <input name="_token" type="hidden" value=" {{ csrf_token() }} "/>

  <div class="form-parada">
    <label class="w3-text"><b>Selecione a Parada em que você está</b></label>
    <div class="form-group-select">
      <div class="custom-select">
        <select>
        <option value="0">010089 - Jequitinhonha - Boa Viagem</option>
        <option value="1">010056 - Domingos Ferreira - Pina</option>
        <option value="2">010043 - Jacy - Imbiribeira</option>
        <option value="3">010078 - Domingos Ferreira - Boa Viagem</option>
        <option value="4">010001 - Herculano Bandeira - Pina</option>
        <option value="5">010012 - Castelo Branco - Candeias</option>
        <option value="6">010023 - Morais - Pina</option>
        </select>
      </div>
    </div>
  </div>

  <div class="custom-select" style="width:200px;">
    <label class="w3-text"><b>Selecione uma Linha:</b></label>
    <select>
      <option value="0">AEROPORTO</option>
      <option value="1">AEROPORTO (OPCIONAL)</option>
      <option value="2">AGUAS COMPRIDAS</option>
      <option value="3">BRASILIA TEIMOSA</option>
      <option value="4">SETÚBAL</option>
      <option value="4">VILA DO IPSEP</option>
      <option value="4">JORDÃO ALTO</option>
    </select>
  </div>

  <div class="custom-select" style="width:200px;">
    <label class="w3-text"><b>Selecione uma itinerário:</b></label>
    <select>
      <option value="0">Principal</option>
      <option value="1">Via Cohab</option>
      <option value="2">Via Rosário</option>
    </select>
  </div>

  <button class="w3-btn w3-blue" id="btn-page" type="text">Localizar</button>

  <div class="help-tip">
    <p>Localizar o ônibus em tempo real, pelo itinerário e informando a parada na qual o usuário está atualmente. O resultado será a previsão de chegada do ônibus de acordo com os parâmetros passados.</p>
  </div>

  <br><br><br>
  RESULTADO<br>
  O ônibus selecionado encontra-se na parada X
  <br><br>
  • A previsão de chegada na sua localidade é de 2:49min
  <br>
  Clique no botão abaixo para atualizar o andamento

  </form>
</div>

<!-- Padding -->
<div class="w3-light-grey w3-container w3-padding-24"><p class="w3-right">Powered by Wizzle &copy</p></div>

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