<!--Tela de login-->
@extends('master')
@section('content')
  <div class="row">
      <div class="col"></div>
      <div class="col-6">
          <div class="card">
                <form class="form" action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                  <div class="card-body">
                      <div class="form-group"><input class="form-control" type="text" name="email" value="" placeholder="Digite seu login" autocomplete="username"></div>
                      <div class="form-group"><input class="form-control" type="password" name="password" value="" placeholder="Digite sua senha" autocomplete="current-password"></div>
                      <!--<div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="lembrar" value=""> Lembrar
                          </label>
                      </div>-->
                      <button class="btn btn-primary btn-block" type="submit" name="button">Ir</button>
                  </div>
                  <div class="card-footer">
                      <div class="col"><a href="esqueci-senha" class="text-sm">Esqueci minha senha</a></div><div class="col"><a href="registrar">Fazer cadastro</a></div>
                  </div>
                </form>
          </div>
      </div>
      <div class="col"></div>
    </div>
@endsection
