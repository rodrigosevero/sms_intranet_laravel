@extends('layouts.admin._master')
@section('ckeditor')
<!-- CK Editor -->
<script src="{{ asset('lib/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
@stop


@section('content')
<section class="content-header">
<h1>
Eventos
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
<li class="active">Eventos</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">

</div>
<!-- /.box-header -->
<div class="box-body">

    <form method="POST" action="{{ route('admin.eventos.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body"> <!-- body-->

    <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
    <label for="titulo">Título</label>
    <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>
    @if ($errors->has('titulo'))
    <span class="help-block">
    <strong>{{ $errors->first('titulo') }}</strong>
    </span>
    @endif
    </div>



    <div class="form-group{{ $errors->has('texto') ? ' has-error' : '' }}">
    <label for="texto">Texto</label>

    <textarea id="editor1" name="texto" rows="10" cols="80">
    {{ old('texto') }}
    </textarea>

    @if ($errors->has('texto'))
    <span class="help-block">
    <strong>{{ $errors->first('texto') }}</strong>
    </span>
    @endif
    </div>



    <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
    <label for="data">Data</label>
    <input id="data" type="date" class="form-control" name="data" value="{{ old('data') }}" required autofocus>
    @if ($errors->has('data'))
    <span class="help-block">
    <strong>{{ $errors->first('data') }}</strong>
    </span>
    @endif
    </div>



    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status">Status</label>
    <select class="form-control" name="status_id" id="status">
    @foreach($status as $stat)
    <option value="{{ $stat->id }}">{{ $stat->nome }}</option>
    @endforeach
    </select>
    @if ($errors->has('status'))
    <span class="help-block">
    <strong>{{ $errors->first('status') }}</strong>
    </span>
    @endif
    </div>

    </div><!-- body-->

    <div class="modal-footer">
    <a href="{{ route('admin.comunicados.index') }}" class="btn btn-default text-capitalize"> Voltar</a>
    <button type="submit" class="btn btn-success text-capitalize"> Salvar</button>
    </div>

    </form>  
    
</div>
</div>

</section>
</div>



@endsection
