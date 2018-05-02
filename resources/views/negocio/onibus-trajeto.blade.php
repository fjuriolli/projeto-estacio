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
    <label class="w3-text"><b>Selecione a Parada A</b></label>
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

  <div class="form-parada">
    <label class="w3-text"><b>Selecione a Parada B</b></label>
    <div class="form-group-select">
      <div class="custom-select">
        <select>
        <option value="0">010012 - Castelo Branco - Candeias</option>
        <option value="1">010056 - Domingos Ferreira - Pina</option>
        <option value="2">010043 - Jacy - Imbiribeira</option>
        <option value="3">010078 - Domingos Ferreira - Boa Viagem</option>
        <option value="4">010001 - Herculano Bandeira - Pina</option>
        <option value="5">010089 - Jequitinhonha - Boa Viagem</option>
        <option value="6">010023 - Morais - Pina</option>
        </select>
      </div>
    </div>
  </div>

  <button class="w3-btn w3-blue" id="btn-page" type="text">Confirmar</button>

  <div class="help-tip">
    <p>Localizar o ônibus em tempo real, basta selecionar a linha no qual o mesmo pertence. O resultado será a parada onde o mesmo está atualmente e sua previsão de retorno.</p>
  </div>

  <br>
  <br>
  <br>
  RESULTADO<br>
  As seguintes linhas passam pelo trajeto selecionado:
  <br>
  • AEROPORTO<br>
  • AEROPORTO (OPCIONAL)<br>
  • AGUAS COMPRIDAS<br>
  <br>

  Clique em alguma linha acima para verificar o seu itinerário completo

  </form>
</div>

<!-- Padding -->
<div class="w3-light-grey w3-container w3-padding-24"><p class="w3-right">Powered by Wizzle &copy</p></div>

<style>

/* --------------- START OF HELP TIP --------------- */
.help-tip{
  position: relative;
  top: -281px;
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