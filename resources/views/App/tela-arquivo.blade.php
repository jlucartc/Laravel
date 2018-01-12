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
          <!--<a href="#" class="btn btn-primary" type="button" name="button">Button 1</a>-->
          <a href="{{ route('deletarImagem',['rota' => $rota]) }}" class="btn btn-danger" type="button" name="button">Deletar</a>
          <a href="#" class="btn btn-success" type="button" name="button" data-toggle="modal" data-target="#renomear">Renomear</a>
          <div class="modal fade" id="renomear">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h3>Renomear</h3>
                </div>
                <div class="modal-body">
                    <form class="form-inline" action="{{ route('renomear') }}" method="post">
                      <!--<input type="hidden" name="id" value="{{ $arquivo->id }}">-->
                      <input class="form-control" type="text" name="nome" value="" autocomplete="off" placeholder="Digite o novo nome">
                      <button class="btn btn-success" type="button" name="button">Confirmar</button>
                    </form>
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
