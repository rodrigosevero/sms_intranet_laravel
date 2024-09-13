@extends('layouts.master')
@section('content')
 <div class="row">
            <div class="col-md-8 col-12">

                <h5 class="default-header"><i class="fas fa-newspaper"></i> COMUNICADO </h5>

              <div class="news-formater">
                 <small>Por {{ $comunicado->user->name }}</small><br/>
                  <small>{{ date('d/m/Y', strtotime($comunicado->created_at->toTimeString())) }} as 
                    {{ $comunicado->created_at->toTimeString() }}

                   </small>
                  <h2>{{ $comunicado->titulo }}</h2>
 
                  {!!html_entity_decode($comunicado->texto)!!}

              </div>

            </div>

            <div class="col-md-4 col-12">
             @include("layouts._right_column")
            </div>
            </div>
        </div>
@endsection