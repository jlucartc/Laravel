<!--Tela de login-->
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
          <div class="card">
                <form class="form" action="#" method="post">
                  <div class="card-body">
                      <div class="form-group"><input class="form-control" type="text" name="login" value="" placeholder="Digite seu login" autocomplete="username"></div>
                      <div class="form-group"><input class="form-control" type="password" name="senha" value="" placeholder="Digite sua senha" autocomplete="current-password"></div>
                      <!--<div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="lembrar" value=""> Lembrar
                          </label>
                      </div>-->
                      <button class="btn btn-primary btn-block" type="submit" name="button">Ir</button>
                  </div>
                  <div class="card-footer">
                      <div class="col"><a href="/esqueci-senha" class="text-sm">Esqueci minha senha</a></div><div class="col"><a href="{{ route('registrar') }}">Fazer cadastro</a></div>
                  </div>
                </form>
          </div>
      </div>
      <div class="col"></div>
    </div>
  </body>
</html>
