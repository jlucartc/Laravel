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
      @if(count($arquivos)/12 < 1)
          @for($i = 0 ; $i < count($arquivos); $i++)
            <div class="col">
                <div class="card">
                  <div class="card-header">
                      {{$arquivos[$i]->nome}}
                  </div>
                  <div class="card-body">
                      <a href="#"><img style="width:100%;height:100%" class="rounded" src="{{ asset('storage/1/imagens/arquivo.png') }}" alt=""></a>
                  </div>
                </div>
            </div>
          @endfor
      @else
        @for($i = 0; $i < count($arquivos)/12; $i++)
          @for($j = 0; $j < 10; $j++)
              <div class="col">
                  <div class="card">
                    <div class="card-header">
                      {{ $arquivos[$i*12+$j]->nome }}
                    </div>
                    <div class="card-body">
                        <a href="#"><img src="{{ asset('storage/'.$arquivos[$i*12+$j]->rota) }}" alt=""></a>
                    </div>
                  </div>
              </div>
          @endfor
        @endfor
      @endif
    @endif
  </div>
  <div class="col"></div>
</div>

@endsection
