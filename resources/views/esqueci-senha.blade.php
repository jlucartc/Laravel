<!--Tela que envia email para possibilitar troca de senha-->
@extends('master')

@section('content')
    <div class="row">
      <div class="col"></div>
      <div class="col-6">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <form class="" action="{{ action('OrderController@ship') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group"><input class="form-control" type="text" name="email" value="" placeholder="Digite seu email" autocomplete="off"></div>
                <button class="btn btn-primary"type="submit" name="button">Recuperar Senha</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col"></div>
    </div>
  </body>
</html>
@endsection
