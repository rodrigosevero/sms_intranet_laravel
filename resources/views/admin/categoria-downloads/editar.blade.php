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
Categoria Downloads
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
<li class="active">Categoria Downloads</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">

</div>
<!-- /.box-header -->
<div class="box-body">

     <form method="POST" action="{{ route('admin.categoria-downloads.update', ['tipo_download' => $tipo_download->id]) }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_method" value="put">

          <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
          <label for="nome">Nome</label>
          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') ?: $tipo_download->nome }}" required autofocus>
          @if ($errors->has('nome'))
          <span class="help-block">
          <strong>{{ $errors->first('nome') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
          <label for="status">Status</label>
          <select class="form-control" name="status_id" id="status">
          @foreach($status as $stat)
          <option @if ($tipo_download->status_id == $stat->id) selected @endif value="{{ $stat->id }}">{{ $stat->nome }}</option>
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
          <input id="created_at" type="text" readonly class="form-control" name="created_at" value="{{ old('created_at') ?: $tipo_download->created_at }}" required autofocus>
          @if ($errors->has('created_at'))
          <span class="help-block">
          <strong>{{ $errors->first('created_at') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('updated_at') ? ' has-error' : '' }}">
          <label for="updated_at">Alterado em</label>
          <input id="updated_at" type="text" readonly class="form-control" name="updated_at" value="{{ old('updated_at') ?: $tipo_download->updated_at }}" required autofocus>
          @if ($errors->has('updated_at'))
          <span class="help-block">
          <strong>{{ $errors->first('updated_at') }}</strong>
          </span>
          @endif
          </div>

          </div><!-- body-->

          <div class="modal-footer">
          <a href="{{ route('admin.categoria-downloads.index') }}" class="btn btn-default text-capitalize"> @lang('messages.goback')</a>
          <button type="submit" class="btn btn-success text-capitalize">  @lang('messages.save')</button>
          </div>
    </form>  

</div>
</div>

</section>
</div>
@endsection
