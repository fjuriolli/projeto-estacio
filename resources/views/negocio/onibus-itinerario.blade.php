@extends('principal')

@section('titulo')

<link href="/css/custom.css" rel="stylesheet">

@stop

@section('conteudo')


<!-- Header -->
<div class="w3-container container-top-page" id="showcase">
  <h1 class="w3-x-jumbo"><b>Localizar Ônibus</b></h1>
  <h1 class="w3-xxlarge w3-text" id="top-page"><b>Linha</b></h1>
  <hr class="w3-round">
</div>

<!-- Form -->
<div class="form-page">
  <form class="w3-container" action="{{route ('itinerario.store')}}" method="post">

  <input name="_token" type="hidden" value=" {{ csrf_token() }} "/>

  <div class="form-parada">
    <label class="w3-text"><b>Selecione a Parada</b></label>
     <div class="form-group-select">
      <div class="custom-select">
        <select name="parada">
        @foreach($paradas as $parada)
        <option value="{{ $parada->id }}">
          {{ $parada->nome }}</option> 
        @endforeach
        </select>
      </div>
     </div>
   </div>

  <div class="custom-select" style="width:200px;">
      <label class="w3-text"><b>Seleciona uma Linha:</b></label>
      <select name="linha">
      @foreach($linhas as $linha)
      <option value="{{ $linha->id }}">
        {{ $linha->nome }}</option> 
      @endforeach
      </select>
    </div>

  <button class="w3-btn w3-blue" id="btn-page" type="text">Localizar</button>

  <div class="help-tip">
    <p>Localizar o ônibus em tempo real pelo itinerário, de acordo com a parada na qual o usuário está atualmente. O resultado será a parada atual onde o ônibus se encontra e a previsão de chegada na parada selecionada pelo usuário.</p>
  </div>

  <br><br><br>
  RESULTADO<br>
  O ônibus selecionado encontra-se na parada X
  <br><br>
  • A previsão de chegada na sua localidade é de 2:49min
  <br>
  Clique no botão abaixo para atualizar as informações da previsão

  </form>
</div>

<!-- Padding -->
<div class="w3-light-grey w3-container w3-padding-24"><p class="w3-right">Powered by Wizzle &copy</p></div>

<style>
  
/* --------------- START OF HELP TIP --------------- */
.help-tip{
  position: relative;
  top: -215px;
  right: -105px;
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