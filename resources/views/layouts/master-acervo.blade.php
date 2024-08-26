<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acervo</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body>
    <nav class="navbar navbar bg-dark navbar-expand-lg " data-bs-theme="dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Sistemas Integrados</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('aluno.index') }}">Pessoas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('documento.index') }}">Tipos de Documentação</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('arquivo.index') }}">Fotos dos Documentos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Consultas
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Documentos existentes</a></li>
                  <li><a class="dropdown-item" href="#">Documentos da pessoa</a></li>
                  <li><a class="dropdown-item" href="#">Fotos dos documentos por RA</a></li>
                  <li><a class="dropdown-item" href="#">Fotos dos documentos por Nome</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        @yield('content')
      </div>

</body>
</html>
