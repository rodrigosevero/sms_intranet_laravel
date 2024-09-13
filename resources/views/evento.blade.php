@extends('layouts.master')
@section('content')
 <div class="row">
            <div class="col-md-8 col-12">

                <h5 class="default-header"><i class="fas fa-newspaper"></i> EVENTO </h5>

              <div class="news-formater">
                <!--  <small>Por {{ $evento->user->name }}</small><br/> -->
                  <small>{{ date('d/m/Y', strtotime($evento->created_at->toTimeString())) }} as 
                    {{ $evento->created_at->toTimeString() }}

                   </small>

                  <h1>{{ date('d/m', strtotime($evento->data)) }}</h1>
                  <h5>{{ $evento->titulo }}</h5>

                  {!!html_entity_decode($evento->texto)!!}

              </div>

            </div>

            <div class="col-md-4 col-12">
             @include("layouts._right_column")
            </div>
            </div>
        </div>
@endsection