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
Usuários
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
<li class="active">Usuários</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">

</div>
<!-- /.box-header -->
<div class="box-body">

     <form method="POST" action="{{ route('admin.usuarios.update', ['usuarios' => $usuario->id]) }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_method" value="put">

        

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name">Nome</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?: $usuario->name }}" required autofocus>
        @if ($errors->has('name'))
        <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-mail</label>
        <input id="email" disabled type="email" class="form-control" name="email" value="{{ old('email') ?: $usuario->email }}">
        @if ($errors->has('email'))
        <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        </div>




        <div class="form-group{{ $errors->has('ac_intranet') ? ' has-error' : '' }}">
        <label for="password-confirm">Acessos</label>
        <br/>
        <label>
        <input name="ac_intranet" type="checkbox" @if ($usuario->ac_intranet) checked @endif value="{{ old('ac_intranet') ?: $usuario->ac_intranet }}"/>
        Intranet
        </label>

        <label>
        <input name="ac_helpdesk" type="checkbox" @if ($usuario->ac_helpdesk) checked @endif value="{{ old('ac_helpdesk') ?: $usuario->ac_helpdesk }}"/>
        Helpdesk
        </label>      
       
        <label>
        <input name="ac_reqobra" type="checkbox" @if ($usuario->ac_reqobra) checked @endif value="{{ old('ac_reqobra') ?: $usuario->ac_reqobra }}"/>
        ReqObra
        </label>      
        </div>


          <div class="form-group{{ $errors->has('created_at') ? ' has-error' : '' }}">
          <label for="created_at">Criado em</label>
          <input id="created_at" type="text" readonly class="form-control" name="created_at" value="{{ old('created_at') ?: $usuario->created_at }}" required autofocus>
          @if ($errors->has('created_at'))
          <span class="help-block">
          <strong>{{ $errors->first('created_at') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('updated_at') ? ' has-error' : '' }}">
          <label for="updated_at">Alterado em</label>
          <input id="updated_at" type="text" readonly class="form-control" name="updated_at" value="{{ old('updated_at') ?: $usuario->updated_at }}" required autofocus>
          @if ($errors->has('updated_at'))
          <span class="help-block">
          <strong>{{ $errors->first('updated_at') }}</strong>
          </span>
          @endif
          </div>

          </div><!-- body-->

          <div class="modal-footer">
          <a href="{{ route('admin.usuarios.index') }}" class="btn btn-default text-capitalize"> @lang('messages.goback')</a>
          <button type="submit" class="btn btn-success text-capitalize">  @lang('messages.save')</button>
          </div>
    </form>  

</div>
</div>

</section>
</div>

@endsection
