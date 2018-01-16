<nav class="navbar bg-dark navbar-expand-sm navbar-dark fixed-top">
  <div class="container">
    <a href="{{ route('/') }}" class="navbar-brand">Olá, {{ Auth::user()->name }}!<a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#links" name="button"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse mx-auto" id="links">
        <ul class="navbar-nav ml-0 mr-auto">
          <li class="nav-item"> <a class="nav-link" href="{{ route('adicionar') }}"><span style="font-size:25px;" class="fa fa-plus text-success mx-auto align-middle"></span></a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}" style="font-size:20px;">Sair</a></li>
        </ul>
        <form class="form-inline mr-0 ml-auto" action="{{ route('pesquisar') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <input class="form-control mr-1" type="text" name="pesquisa" value="" autocomplete="off" placeholder="Pesquisar">
              <button class="btn btn-secondary" type="submit" name="button"><span class="fa fa-search"></span></button>
            </div>
        </form>
      </div>

    </div>
  </nav>
