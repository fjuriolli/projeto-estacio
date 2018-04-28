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
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>

<body>
"#E6E6FA"
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-top w3-large w3-padding" id="mySidebar"><br>
  <div class="w3-container">
    <h3 class="w3-padding-64" style="color:white"><b>Wizzle</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="#" class="w3-bar-item w3-button w3-hover-white">Ônibus Agora!</a> 
    <a href="#" class="w3-bar-item w3-button w3-hover-white">Ônibus p/ Itinerário</a> 
    <a href="#" class="w3-bar-item w3-button w3-hover-white">Ônibus Trajetos</a> 
  </div>

  <div class="w3-dropdown-hover">
    <button class="w3-button w3-hover-white">Cadastro <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button w3-hover" href="/cadastro-anel">Anel</a>
      <a class="w3-bar-item w3-button w3-hover" href="/cadastro-itinerario">Itinerário</a>
      <a class="w3-bar-item w3-button w3-hover" href="/cadastro-linha">Linha</a>
      <a class="w3-bar-item w3-button w3-hover" href="/cadastro-onibus">Ônibus</a>
      <a class="w3-bar-item w3-button w3-hover" href="/cadastro-parada">Parada</a>
    </div>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

@yield('conteudo')

<!-- End page content -->
</div>

<script>

</script>

</body>
</html>
