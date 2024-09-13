@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-8 col-12">
      <h5 class="default-header"><i class="fas fa-bullhorn"></i> COMUNICADOS</h5>
    

      @foreach ($comunicados as $comunicado)
      <div class="card bottom-mg10">
         <div class="card-body">
            <div class="row">
               <div class="col-md-12 col-12">
                  <big><i class="fas fa-exclamation-triangle icon_yellow"></i></big><br/>
                  <small>{{ date('d/m/Y', strtotime($comunicado->created_at->toTimeString())) }}</small>
                  <h5 class="card-title"><a href="{{url('comunicado/'.$comunicado->id.'')}}" class="text-dark">
                     {{ $comunicado->titulo}}</a></h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                      {!!html_entity_decode($comunicado->texto)!!}
                  </h6>
               </div>
            </div>
         </div>
      </div>
      @endforeach
      
      {{ $comunicados->links() }}

   </div>
   <div class="col-md-4 col-12">
      @include("layouts._right_column")
   </div>
</div>
</div>
@endsection