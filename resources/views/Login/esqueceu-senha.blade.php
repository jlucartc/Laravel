<!--Tela que envia email para possibilitar troca de senha-->


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
      <div class="col"></div>
      <div class="col-6">
        <div class="container">
          <div class="card">
            <div class="card-body">
              <form class="" action="index.html" method="post">
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
