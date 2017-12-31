<!--Tela para registrar novos usuários-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <div class="row">
        <div class="col">

        </div>
        <div class="col-6">
          <div class="container">
            <div class="card">
              <form action="{{ route('') }}" method="">
              <div class="card-body">
                  <input type="text" name="nome" value="" autocomplete="off" placeholder="Digite seu nome">
                  <input type="text" name="email" value="" autocomplete="off" placeholder="Digite seu email">
                  <input type="text" name="senha" value="" autocomplete="current-password" placeholder="Digite sua senha">
                  <input type="text" name="senha_confirmation" value="" autocomplete="current-password" placeholder="Confirme sua senha">
              </div>
              <div class="card-footer">
                  <button class="btn btn-primary" type="submit" name="button"></button>
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
