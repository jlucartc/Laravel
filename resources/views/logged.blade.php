<nav class="navbar bg-dark navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a href="{{ route('/') }}" class="navbar-brand">Olá, {{ Auth::user()->name }}!<a>

      <ul class="navbar-nav">
        <li class="nav-item"> <a class="nav-link" href="{{ route('adicionar') }}"><span class="fa fa-plus"></span></a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}">Sair</a></li>
        <li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" >Dropdown</a>
          <div class="dropdown-menu">
            <a href="#" class="dropdown-item">Link 1</a>
            <a href="#" class="dropdown-item">Link 2</a>
            <a href="#" class="dropdown-item">Link 3</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
