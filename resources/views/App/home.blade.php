<!--Tela inicial da aplicação-->
@extends('master')
@section('content')
@include('logged')
<div class="container">
  <div class="row">
  <div class="col"></div>
  <div class="col-8">
    @if($arquivos->isEmpty())
    <div class="jumbotron">
      <h2>Bem Vindo</h2>
    </div>
    @else
      <div class="row">
        @foreach($arquivos as $arquivo)
            <div class="col-sm-4">
                <div class="card">
                  <a href="{{ route('arquivo',['rota' => $arquivo->rota]) }}"> <img class="card-img-top" src="{{ asset($arquivo->rota) }}" alt=""> </a>
                  <div class="card-body">
                      <p>{{ $arquivo->nome }}</p>
                  </div>
                </div>
            </div>
        @endforeach
      </div>
    @endif
  </div>
  <div class="col"></div>
</div>
</div>
@endsection
