<!--Tela inicial da aplicação-->
@extends('master')
@section('content')
@include('nav')
<div class="container">
  <div class="row">
  <div class="col"></div>
  <div class="col-8">
    @if(!isset($arquivos))
    <div class="jumbotron">
      <h2>Bem Vindo</h2>
    </div>
    @else
      <div class="row">
        @foreach($arquivos as $arquivo)
            <div class="col-sm-4">
                <div class="card mb-4">
                  <a href="{{ route('arquivo',['id' => $arquivo->id]) }}"> <img class="card-img-top border border-secondary" src="{{ asset($arquivo->rota) }}" alt=""> </a>
                  <div class="card-body border border-top-0 border-secondary">
                      <p class="text-truncate" data-toggle="tooltip" title="{{$arquivo->nome}}">{{ $arquivo->nome }}</p>
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
