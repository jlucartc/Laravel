@extends('master')
@section('content')
<div class="navbar fixed-top bg-dark">
  <a href="#" class="navbar-brand"><span class="fa fa-rebel"></span> </a>
  <div class="d-flex justify-content-end mr-4">
    <form class="form-inline d-inline-flex float-right" action="{{ route('login') }}" method="post">
      {{ csrf_field() }}
      <input class="form-control mr-1" type="text" name="email" value="" autofocus autocomplete="username" placeholder="Digite seu email">
      <input class="form-control mr-1" type="password" name="password" value="" autocomplete="password" placeholder="Digite sua senha">
      <button class="btn btn-secondary" type="submit" name="button">Entrar</button>
    </form>
    <a class="nav-link" href="{{ route('esqueci-senha') }}"><small>Esqueceu a senha?</small></a>
  </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Faça o seu cadastro</h3>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('register') }}" method="post">
                        {{ csrf_field() }}
                        <input class="form-control mb-2" id="nome" type="text" name="nome" value="" autocomplete="off" placeholder="Digite seu nome">
                        <input class="form-control mb-2" id="email" type="email" name="email" value="" autocomplete="email" placeholder="Digite seu email">
                        <input class="form-control mb-2" id="senha" type="password" name="senha" value="" autocomplete="password" placeholder="Digite sua senha">
                        <input class="form-control mb-2" id="senha_confirmed" type="password" name="senha_confirmation" value="" autocomplete="password" placeholder="Confirme sua senha">
                        <button class="btn btn-success" type="submit" name="button">Cadastrar</button>
                    </form>
                    @if($errors->any())
                      @foreach($errors->all() as $err)
                        <div class="alert-danger">
                          {{ $err }}
                        </div>
                      @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
