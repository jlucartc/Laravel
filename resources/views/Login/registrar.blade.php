<!--Tela para registrar novos usuários-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" href="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" href="{{ asset('js/bootstrap.min.js') }}"></script>
    <title></title>
  </head>
  <body>
      <div class="row">
        <div class="col">

        </div>
        <div class="col-6">
          <div class="container">
            <div class="card">
              <form action="#" method="">
              <div class="card-body">
                  <div class="form-group"><input class="form-control" type="text" name="nome" value="" autocomplete="off" placeholder="Digite seu nome"></div>
                  <div class="form-group"><input class="form-control" type="text" name="email" value="" autocomplete="off" placeholder="Digite seu email"></div>
                  <div class="form-group"><input class="form-control" type="text" name="senha" value="" autocomplete="current-password" placeholder="Digite sua senha"></div>
                  <div class="form-group"><input class="form-control" type="text" name="senha_confirmation" value="" autocomplete="current-password" placeholder="Confirme sua senha"></div>
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
  </body>
</html>
