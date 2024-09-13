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
Sistemas
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
<li class="active">Sistemas</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">

</div>
<!-- /.box-header -->
<div class="box-body">

    <form method="POST" action="{{ route('admin.sistemas.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body"> <!-- body-->

    <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
    <label for="nome">Nome</label>
    <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" required autofocus>
    @if ($errors->has('nome'))
    <span class="help-block">
    <strong>{{ $errors->first('nome') }}</strong>
    </span>
    @endif
    </div>


    <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
    <label for="descricao">Descrição</label>
    <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}" required autofocus>
    @if ($errors->has('descricao'))
    <span class="help-block">
    <strong>{{ $errors->first('descricao') }}</strong>
    </span>
    @endif
    </div>


    <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
    <label for="avatar">Foto</label><br/>
    <input type="file" name="foto">
    @if ($errors->has('foto'))
    <span class="help-block">
    <strong>{{ $errors->first('foto') }}</strong>
    </span>
    @endif
    </div>




    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
    <label for="link">Link</label>
    <input id="link" type="text" class="form-control" name="link" value="http://{{ old('link') }}" required autofocus>
    @if ($errors->has('link'))
    <span class="help-block">
    <strong>{{ $errors->first('link') }}</strong>
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
    <a href="{{ route('admin.sistemas.index') }}" class="btn btn-default text-capitalize"> @lang('messages.goback')</a>
    <button type="submit" class="btn btn-success text-capitalize"> @lang('messages.save')</button>
    </div>

    </form>  
    
</div>
</div>

</section>
</div>
<!-- @if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif -->

<!-- DataTables -->

@endsection
