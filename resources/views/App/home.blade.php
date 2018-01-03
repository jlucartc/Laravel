<!--Tela inicial da aplicação-->
@extends('master')

@section('content')
    <div class="row">
      <div class="col">
          <nav class="navbar bg-dark navbar-expand-sm navbar-dark">
              <a href="#" class="navbar-brand">Olá, mundo!<a>

              <ul class="navbar-nav">
                  <li class="nav-item"> <a class="nav-link" href="logout">Sair</a> </li>
                  <li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" >Dropdown</a>
                    <div class="dropdown-menu">
                      <a href="#" class="dropdown-item">Link 1</a>
                      <a href="#" class="dropdown-item">Link 2</a>
                      <a href="#" class="dropdown-item">Link 3</a>
                    </div>
                  </li>
              </ul>

          </nav>
      </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="container">
        <div class="jumbotron">
          <h2>Bem Vindo</h2>
        </div>
      </div>
    </div>
  </div>

  <!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand --
  <a class="navbar-brand" href="#">Logo</a>

  <!-- Links --
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Link 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>

    <!-- Dropdown --
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
        Dropdown link
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>
  </ul>
</nav>-->

@endsection
