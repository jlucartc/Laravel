<!--Tela para registrar novos usuários-->
@extends('master')

@section('content')
      <div class="row">
        <div class="col">

        </div>
        <div class="col-6">
          <div class="container">
            <div class="card">
              <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
              <div class="card-body">
                  <div class="form-group"><input id="nome" class="form-control" type="text" name="nome" value="" autocomplete="off" placeholder="Digite seu nome"></div>
                  <div class="form-group"><input id="email" class="form-control" type="text" name="email" value="" autocomplete="off" placeholder="Digite seu email"></div>
                  <div class="form-group"><input id="senha" class="form-control" type="password" name="senha" value="" autocomplete="current-password" placeholder="Digite sua senha"></div>
                  <div class="form-group"><input id="senha_confirmed" class="form-control" type="password" name="senha_confirmation" value="" autocomplete="current-password" placeholder="Confirme sua senha"></div>
              </div>
              <div class="card-footer">
                  <button class="btn btn-primary btn-block" type="submit" name="button">Cadastrar</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <div class="col">

        </div>
      </div>
@endsection
