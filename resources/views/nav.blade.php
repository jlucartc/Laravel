<nav class="navbar bg-dark navbar-expand-sm navbar-dark fixed-top">
  <div class="container">
    <a href="{{ route('/') }}" class="navbar-brand">Olá, {{ Auth::user()->name }}!<a>
      <form class="form-inline" action="{{ route('pesquisar') }}" method="post">
          {{ csrf_field() }}
          <input class="form-control mr-1" type="text" name="pesquisa" value="" autocomplete="off" placeholder="Pesquisar">
          <button class="btn btn-secondary" type="submit" name="button"><span class="fa fa-search"></span></button>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item"> <a class="nav-link" href="{{ route('adicionar') }}"><span style="font-size:25px;" class="fa fa-plus text-success mx-auto align-middle"></span></a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}" style="font-size:20px;">Sair</a></li>
      </ul>
    </div>
  </nav>
