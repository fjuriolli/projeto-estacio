<!DOCTYPE html>
<html>
<title>Wizzle</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link href="/css/custom.css" rel="stylesheet">

@yield ('titulo')

<body>
  
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-top w3-large w3-padding" id="mySidebar"><br>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Wizzle</b></h3>
  </div>
  <div class="w3-bar-block">
    <a class="w3-bar-item w3-button w3-hover-white" href="#">Home</a> 
    <a class="w3-bar-item w3-button w3-hover-white" href="/formulario-movimentar">Movimentar Ônibus</a> 
    <a class="w3-bar-item w3-button w3-hover-white" href="/formulario-agora">Ônibus Agora!</a> 
    <a class="w3-bar-item w3-button w3-hover-white" href="/formulario-itinerario">Ônibus p/ Parada</a> 
    <a class="w3-bar-item w3-button w3-hover-white" href="onibus-trajeto">Ônibus Trajetos</a> 
  </div>

  <div class="w3-dropdown-hover">
    <button class="w3-button w3-hover-white">Cadastro <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button w3-hover" href="{{action('AnelController@novo')}}">Anel</a>
      <a class="w3-bar-item w3-button w3-hover" href="{{action('ItinerarioController@novo')}}">Itinerário</a>
      <a class="w3-bar-item w3-button w3-hover" href="{{action('LinhaController@novo')}}">Linha</a>
      <a class="w3-bar-item w3-button w3-hover" href="{{action('LogradouroController@novo')}}">Logradouro</a>
      <a class="w3-bar-item w3-button w3-hover" href="{{action('OnibusController@novo')}}">Ônibus</a>
      <a class="w3-bar-item w3-button w3-hover" href="{{action('ParadaController@novo')}}">Parada</a>
    </div>
  </div>
</nav>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

@yield('conteudo')

<!-- End page content -->
</div>

</body>

</html>
