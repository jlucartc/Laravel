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
      <div class="card-header border border-bottom-0 border-secondary text-center">
        <h3>{{ $arquivo['nome']}}</h3>
      </div>
      <div class="card-body border border-bottom-0 border-secondary">
        <img class="card-img-top border border-secondary" src="{{ asset($arquivo['rota']) }}" alt="">
      </div>
      <div class="card-footer border border-secondary justify-content-middle">
          <!--<a href="#" class="btn btn-primary" type="button" name="button">Button 1</a>-->
            <!--<form class="form d-inline-flex" action="{{ route('deletar',['rota' => $arquivo['rota']]) }}" method="post">
                {{ csrf_field() }}-->
                <button type="button" class="btn btn-danger mr-1" name="button" data-toggle="modal" data-target="#confirmarDelecao">Deletar</button>
                <button class="btn btn-success" type="button" name="button" data-toggle="modal" data-target="#renomear">Renomear</button>
            <!--</form>-->
            <!--<a href="#" class="btn btn-danger" type="button" name="button">Deletar</a>-->
          <!--<a href="#" type="button" name="button" data-toggle="modal" data-target="#renomear">Renomear</a>-->
          <div class="modal fade" id="renomear">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h3>Renomear</h3>
                </div>
                <div class="modal-body">
                    <form class="form-inline" action="{{ route('renomear',['arquivo' => $arquivo]) }}" method="post">
                      {{ csrf_field() }}
                      <!--<input type="hidden" name="id" value="">-->
                      <input class="form-control" type="text" name="nome" value="" autocomplete="off" placeholder="Digite o novo nome">
                      <button class="btn btn-success" type="submit" name="button">Confirmar</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="confirmarDelecao">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h3>Deseja deletar '{{ $arquivo['nome'] }}' ?</h3>
                </div>
                <div class="modal-body">
                    <div class="">
                        <form class="form d-inline-flex" action="{{ route('deletar',['rota' => $arquivo['rota']]) }}" method="post">
                          {{ csrf_field() }}
                          <button class="btn btn-secondary mr-1" type="submit" name="button">Sim</button>
                          <button class="btn btn-primary" type="button" name="button" data-dismiss="modal" autofocus>Não</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  </div>
</div>
  <div class=""></div>
</div>
</div>
@endsection
