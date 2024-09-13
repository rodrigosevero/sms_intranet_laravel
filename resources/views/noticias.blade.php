@extends('layouts.master')
@section('content')
 <div class="row">
            <div class="col-md-8 col-12">

            <h5 class="default-header"><i class="fas fa-newspaper"></i> NOTÍCIAS</h5>
        
             @foreach ($noticias as $noticia)
            <div class="card bottom-mg10">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-12">
                  <a href="{{url('noticia/'.$noticia->idnoticia.'')}}"><img class="img-fluid" src="http://201.24.3.67:8080/portal/upload/imagens/{{ $noticia->imagemnoticia }}" alt="First slide"></a>
                </div>

                <div class="col-md-9 col-12">
                  <small>{{ $noticia->datanoticia }}</small>
                  <h5 class="card-title"><a href="{{url('noticia/'.$noticia->idnoticia.'')}}" class="text-dark">
                    {{ $noticia->titulonoticia }}</a></h5>
                </div>
              </div>
            </div>
            </div>
              @endforeach

            </div>

            <div class="col-md-4 col-12">
             @include("layouts._right_column")
            </div>
            </div>
        </div>
@endsection