@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-8 col-12">
      <h5 class="default-header"><i class="fas fa-desktop"></i> SISTEMAS</h5>
   
       

       <div class="col-md-12 col-12"> 

             <img class="card-img-top" src="{{ asset('storage/sistemas/'.$sistema->foto.'') }}" alt="Card image cap">

            <h2>{{ $sistema->nome }}</h2>
            <p class="card-text">{{ $sistema->descricao }}</p>
            
           
       


<div id="accordion">



<!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>

 -->


   
        @forelse ($documentacoes as $documentacao)
         <div class="list-group">
            <a class="list-group-item list-group-item-action bg-secondary text-white" data-toggle="collapse" href="#collapseExample-{{ $documentacao->id }}" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="fas fa-file-video"></i> {{ $documentacao->titulo }}
            </a>

            <div class="collapse" id="collapseExample-{{ $documentacao->id }}">
            <div class="card card-body text-dark">
            <a target="_blank" href="{{asset('storage/sistemas/'.$documentacao->arquivo.'')}}">Visualizar Apostila</a>
            <br/>
            <a target="_blank" href="{{asset('storage/sistemas/'.$documentacao->video.'')}}">Ver Vídeo Aula</a>
            </div>
            </div>

         </div>

         @empty

            <div class="alert alert-warning" role="alert">
             <span>Não há documentação cadastrada para esse sistema.</span>
            </div>
        
         @endforelse
   



 

</div>












       </div>

 
      
     

      
   </div>
   <div class="col-md-4 col-12">
      @include("layouts._right_column")
   </div>
</div>
</div>
@endsection