@extends('layouts.master')
@section('content')
<div class="row"> <!--row -->
   <div class="col-md-8 col-12"> <!--col8 -->
          <h5 class="default-header"><i class="fas fa-download"></i> DOWNLOADS</h5>



                <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link text-dark {{{ (Request::is('downloads') ? 'active' : '') }}}" href="{{url('downloads')}}">Todos</a>
                </li>
                @foreach ($tiposdownloads as $tipodownload)
                <li class="nav-item"> 
                <a class="nav-link text-dark {{{ (Request::is('downloads/'.$tipodownload->id.'') ? 'active' : '') }}}" href="{{url('downloads/'.$tipodownload->id.'')}}">{{$tipodownload->nome }}</a>
                </li>
                @endforeach
                </ul>

                  <br/>
            

              @foreach ($downloads as $download)
              <div class="card bottom-mg10">
              <div class="card-body">
              <h5 class="card-title">{{ $download->titulo }}</h5>
              
              <a href="{{ asset('storage/downloads/'.$download->arquivo.'')}}" class="btn btn-sm btn-primary text-white"><i class="fas fa-download"></i> Download</a>
     
              </div>
              </div>
              @endforeach


              {{ $downloads->links() }}

           

   </div> <!-- col8 -->
   
   <div class="col-md-4 col-12"> <!--col12 -->
      @include("layouts._right_column")
   </div> <!--col12 -->

  </div>
</div><!--row -->
@endsection