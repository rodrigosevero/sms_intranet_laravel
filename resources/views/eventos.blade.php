@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-8 col-12">
      <h5 class="default-header"><i class="fas fa-calendar-alt"></i> EVENTOS</h5>
      

      @foreach ($eventos as $evento)
      <div class="card bottom-mg10">
         <div class="card-body">
            <div class="row">
               <div class="col-md-12 col-12">
                  <h3>{{ date('d/m', strtotime($evento->data)) }} </h3>
                  <h5 class="card-title"><a href="{{url('evento/'.$evento->id.'')}}" class="text-dark">
                  {{ $evento->titulo }} </a></h5>
                  <h6 class="card-subtitle mb-2 text-muted">
                    {!!html_entity_decode($evento->texto)!!}
                  </h6>
               </div>
            </div>
         </div>
      </div>
      @endforeach

      {{ $eventos->links() }}

   </div>
   <div class="col-md-4 col-12">
      @include("layouts._right_column")
   </div>
</div>
</div>
@endsection