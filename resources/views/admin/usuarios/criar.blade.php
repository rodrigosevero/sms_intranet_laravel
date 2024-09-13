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

    <form method="POST" action="{{ route('admin.usuarios.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body"> <!-- body-->

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Nome</label>
    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
    @if ($errors->has('name'))
    <span class="help-block">
    <strong>{{ $errors->first('name') }}</strong>
    </span>
    @endif
    </div>


    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">E-mail</label>
    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    @if ($errors->has('email'))
    <span class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    </div>




    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password">Senha</label>
    <input id="password" type="password" class="form-control" name="password" required>
    @if ($errors->has('password'))
    <span class="help-block">
    <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
    </div>


    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password-confirm">Confirmar senha</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>



   <div class="form-group{{ $errors->has('ac_intranet') ? ' has-error' : '' }}">
    <label for="password-confirm">Acessos</label>
        <br/>
        <label>
        <input name="ac_intranet" type="checkbox" />
        Intranet
        </label>

        <label>
        <input name="ac_helpdesk" type="checkbox" />
        Helpdesk
        </label>  


        <label>
        <input name="ac_reqobra" type="checkbox" />
        ReqObra
        </label>     
    </div>


    </div><!-- body-->

    <div class="modal-footer">
    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-default text-capitalize"> Voltar</a>
    <button type="submit" class="btn btn-success text-capitalize"> Salvar</button>
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
