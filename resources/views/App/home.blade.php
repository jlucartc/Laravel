<!--Tela inicial da aplicação-->
@extends('master')
@section('content')
@include('logged')
<div class="container">
  <div class="row">
  <div class="col"></div>
  <div class="col-8">
    @if( $arquivos == NULL )
    <div class="jumbotron">
      <h2>Bem Vindo</h2>
    </div>
    @else
      @if(count($arquivos)/6 < 1)
        <div class="container">
        <div class="row">
          @for($i = 0 ; $i < count($arquivos); $i++)
            <div class="col-lg">
                <div class="card">
                  <div class="card-footer">
                      {{$arquivos[$i]->nome}}
                  </div>
                      <a href="{{ asset($arquivos[$i]->rota) }}"><img class="card-img-top img-fluid" src="{{ asset($arquivos[$i]->rota) }}" alt=""></a>
                </div>
            </div>
            </div>
          @endfor
        </div>
      </div>
      @else
        @for($i = 0; $i < count($arquivos)/6; $i++)
        <div class="container">
        <div class="row">
          @for($j = 0; $j < 6; $j++)
              <div class="col-lg">
                <div class="card">
                    <a href="{{ asset($arquivos[$i*6+$j]->rota) }}"><img style="vertical-align:bottom;" class="card-img-bot img-fluid" src="{{ asset($arquivos[$i*6+$j]->rota) }}" alt=""></a>
                  <div class="card-footer">
                    {{ $arquivos[$i*6+$j]->nome }}
                  </div>
                </div>
              </div>
          @endfor
        </div>
      </div>
        @endfor
      @endif
    @endif
  </div>
  <div class="col"></div>
</div>
</div>
@endsection
