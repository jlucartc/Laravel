<!--Tela responsável por adicionar arquivos à conta-->
@extends('master')

@section('content')
  @include('logged')
  <div class="row">
    <div class="col"></div>
    <div class="col-8">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Adicionar arquivo</h4>
          </div>
          <div class="card-body">
            <form class="" action="{{ route('publico') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group"><input class="form-control" type="text" name="nome" value="" autocomplete="off" placeholder="Digite o nome do arquivo"></div>
              <div class="form-group"><input class="form-control" type="file" name="arquivo" value=""></div>
              <button class="btn btn-primary" type="submit" name="button">Adicionar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>

@endsection
