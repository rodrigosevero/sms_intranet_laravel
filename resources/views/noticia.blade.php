@extends('layouts.master')
@section('content')
 <div class="row">
            <div class="col-md-8 col-12">

                <h5 class="default-header"><i class="fas fa-newspaper"></i> NOTICIAS </h5>

              <div class="news-formater">
                  <small>{{ $noticia->datanoticia }} as 
                    {{ $noticia->horanoticia }}

                   </small>
                  <h2>{{ $noticia->titulonoticia }}</h2>
                  <small>Por {{ $noticia->nomejornalista }} - {{ $noticia->nomefotografo }}</small>
                  
                  <img class="img-fluid" src="http://201.24.3.67:8080/portal/upload/imagens/{{ $noticia->imagemnoticia }}" alt="some">
                  {!!html_entity_decode($noticia->textonoticia)!!}
              </div>

            </div>

            <div class="col-md-4 col-12">
             @include("layouts._right_column")
            </div>
            </div>
        </div>
@endsection