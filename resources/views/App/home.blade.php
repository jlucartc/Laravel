<!--Tela inicial da aplicação-->
@extends('master')

@section('content')
@include('logged')
<div class="row">
  <div class="col"></div>
  <div class="col-8">
    @if( $arquivos == NULL )
    <div class="jumbotron">
      <h2>Bem Vindo</h2>
    </div>
    @else
      @if(count($arquivos)/6 < 1)
        <div class="row">
          @for($i = 0 ; $i < count($arquivos); $i++)
            <div class="col-sm">
                <div class="card">
                  <div class="card-header">
                      {{$arquivos[$i]->nome}}
                  </div>
                  <div class="card-body">
                      <a href="{{ asset($arquivos[$i]->rota) }}"><img style="width:100%;height:100%" class="rounded" src="{{ asset($arquivos[$i]->rota) }}" alt=""></a>
                  </div>
                </div>
            </div>
          @endfor
        </div>
      @else
        @for($i = 0; $i < count($arquivos)/6; $i++)
        <div class="row">
          @for($j = 0; $j < 6; $j++)
              <div class="col-sm">
                  <div class="card" style="width:100%;height:100%">
                    <div class="card-header">
                      {{ $arquivos[$i*6+$j]->nome }}
                    </div>
                    <div class="card-body">
                        <a href="{{ asset($arquivos[$i*6+$j]->rota) }}"><img style="width:100%;height:100%;" src="{{ asset($arquivos[$i*6+$j]->rota) }}" alt=""></a>
                    </div>
                  </div>
              </div>
          @endfor
        </div>
        @endfor
      @endif
    @endif
  </div>
  <div class="col"></div>
</div>

@endsection
