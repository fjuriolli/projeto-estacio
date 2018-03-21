<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    @yield ('titulo')
    <title></title>

</head>
<body>
  <div class="container">

  <nav class="navbar navbar-default">
    <div class="container-fluid">

    <div class="navbar-header">      
      <a class="navbar-brand">Wizzle</a>
    </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="">Exemplo Menu</a></li>
        <li><a href="">Exemplo Menu</a></li>
        <li><a href="">Exemplo Menu</a></li>
        <li><a href="">Exemplo Menu</a></li>
      </ul>

    </div>
  </nav>

    @yield('conteudo')

  </div>
</body>
</html>