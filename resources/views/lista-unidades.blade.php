@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-8 col-12">
      <h5 class="default-header"><i class="fas fa-hospital"></i> UNIDADES DE SAÚDE <i class="fas fa-arrow-right"></i> <i>LISTA DE UNIDADES</i></h5>
      <div class="search-box">
         <form method="GET" action="{{ route('unidades-de-saude.lista-de-unidades') }}" enctype="multipart/form-data">
            <div class="form-group">
               <label for="exampleInputPassword1">Pesquisar Unidade</label>
               <input type="text" class="form-control" id="unidade" value="{{ isset($_GET['unidade']) ? $_GET['unidade'] : '' }}" name="unidade" placeholder="Pesquisa a unidade">

               @if ($errors->has('unidade'))
               <span class="help-block">
               <strong>{{ $errors->first('unidade') }}</strong>
               </span>
               @endif

                <br/>
               <button type="submit" class="btn btn-success">Pesquisar</button>

               @if(isset($_GET['unidade']) ? $_GET['unidade'] : '')
               <a href="{{ url('/unidades-de-saude/lista-de-unidades') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Resetar Pesquisa</a>
               <hr/>
               <p>{{ $unidadessaude->count()}} resultado(s) encontrado(s) para {{ $_GET['unidade'] }}.</p>
               @endIf


            </div>
         </form>
      </div>
      <hr/>

      @foreach ($unidadessaude as $unidadesaude)
      <div class="card bottom-mg10">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3 col-12">

                  @if($unidadesaude->foto and empty($unidadesaude->foto_google))  
                   <img class="img-fluid" src="{{ asset('storage/unidades/'.$unidadesaude->foto.'') }}" alt="">
                  @elseif($unidadesaude->foto_google)
                   <img class="img-fluid" src="{{ $unidadesaude->foto_google }}" alt="">
                  @elseif(empty($unidadesaude->foto) and empty($unidadesaude->foto_google))
                   <img class="img-fluid" src="{{ asset('storage/unidades/default-pic.jpg') }}" alt="foto">
                  @endif

               </div>
               <div class="col-md-6 col-12">
                  <small>{{ $unidadesaude->tipounidade->nome }}</small>
                  <h5>{{ $unidadesaude->nome }}</h5>
                  <span class="badge badge-secondary text-uppercase">{{ $unidadesaude->regionalunidade->nome }}</span><br/>
                  <span class="card-subtitle mb-2 text-muted">
                  {{ $unidadesaude->endereco }}<br/> 
                  Telefone: {{ $unidadesaude->telefone }}</span>
               </div>
               <div class="col-md-3 col-12 pad-list">
                  @if ($unidadesaude->latitude and $unidadesaude->longitude)
                  <a href="{{ url('unidades-de-saude/mapa-de-unidades?&unidade='.$unidadesaude->nome.'') }}" class="btn btn-sm btn-primary"><i class="fas fa-map-marker-alt"></i> ver localização</a>
                  @endif

               </div>
            </div>
         </div>
      </div>
      @endforeach

 
     {{ $unidadessaude->links() }}  

   </div>
   <div class="col-md-4 col-12">
      @include("layouts._right_column")
   </div>
</div>
</div>
@endsection