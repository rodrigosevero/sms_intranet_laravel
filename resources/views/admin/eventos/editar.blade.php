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

     <form method="POST" action="{{ route('admin.eventos.update', ['eventos' => $evento->id]) }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_method" value="put">

          <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
          <label for="titulo">Título</label>
          <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') ?: $evento->titulo }}" required autofocus>
          @if ($errors->has('titulo'))
          <span class="help-block">
          <strong>{{ $errors->first('titulo') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('texto') ? ' has-error' : '' }}">
          <label for="texto">Texto</label>
          <textarea id="editor1" name="texto" rows="10" cols="80">
          {{ old('texto') ?: $evento->texto }}
          </textarea>
          @if ($errors->has('texto'))
          <span class="help-block">
          <strong>{{ $errors->first('texto') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('data') ? ' has-error' : '' }}">
          <label for="data">Data</label>
          <input id="data" type="date" class="form-control" name="data" value="{{ old('data') ?: $evento->data }}" required autofocus>
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
          <option @if ($evento->status_id == $stat->id) selected @endif value="{{ $stat->id }}">{{ $stat->nome }}</option>
          @endforeach
          </select>
          @if ($errors->has('status'))
          <span class="help-block">
          <strong>{{ $errors->first('status') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
          <label for="created_at">Criado em</label>
          <input id="created_at" type="text" readonly class="form-control" name="created_at" value="{{ old('created_at') ?: $evento->created_at }}" required autofocus>
          @if ($errors->has('created_at'))
          <span class="help-block">
          <strong>{{ $errors->first('created_at') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('updated_at') ? ' has-error' : '' }}">
          <label for="updated_at">Alterado em</label>
          <input id="updated_at" type="text" readonly class="form-control" name="updated_at" value="{{ old('updated_at') ?: $evento->updated_at }}" required autofocus>
          @if ($errors->has('updated_at'))
          <span class="help-block">
          <strong>{{ $errors->first('updated_at') }}</strong>
          </span>
          @endif
          </div>

          </div><!-- body-->

          <div class="modal-footer">
          <a href="{{ route('admin.eventos.index') }}" class="btn btn-default text-capitalize"> @lang('messages.goback')</a>
          <button type="submit" class="btn btn-success text-capitalize">  @lang('messages.save')</button>
          </div>
    </form>  

</div>
</div>

</section>
</div>
@endsection
