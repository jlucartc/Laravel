<!--Tela responsável por ver detalhes e opções de um arquivo-->
@extends('master')
@section('content')
@include('nav')
<div class="container">
<div class="row justify-content-center">
  <div class=""></div>
  <div class="col-8">
    <div class="row justify-content-center">
    <div class="col-8">
    <div class="card">
      <div class="card-body border border-bottom-0 border-secondary">
        <img class="card-img-top border border-secondary" src="{{ asset($rota) }}" alt="">
      </div>
      <div class="card-footer border border-secondary">
          <a href="#" class="btn btn-primary" type="button" name="button">Button 1</a>
          <a href="{{ route('deletarImagem',['rota' => $rota]) }}" class="btn btn-danger" type="button" name="button">Deletar</a>
          <a href="#" class="btn btn-success" type="button" name="button">Button 3</a>
      </div>
    </div>
  </div>
  </div>
</div>
  <div class=""></div>
</div>
</div>
@endsection
