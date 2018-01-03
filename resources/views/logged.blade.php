<div class="row">
  <div class="col">
      <nav class="navbar bg-dark navbar-expand-sm navbar-dark">
          <a href="{{ action('HomeController@index') }}" class="navbar-brand">Olá, mundo!<a>

          <ul class="navbar-nav">
              <li class="nav-item"> <a class="nav-link" href="auth/adicionar"><span class="fa fa-plus"></span></a></li>
              <li class="nav-item"> <a class="nav-link" href="logout">Sair</a></li>
              <li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" >Dropdown</a>
                <div class="dropdown-menu">
                  <a href="#" class="dropdown-item">Link 1</a>
                  <a href="#" class="dropdown-item">Link 2</a>
                  <a href="#" class="dropdown-item">Link 3</a>
                </div>
              </li>
          </ul>

      </nav>
  </div>
</div>
