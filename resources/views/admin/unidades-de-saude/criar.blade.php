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
Unidades
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
<li class="active">Unidades</li>
</ol>
</section>

<!-- Main content -->
<section class="content">

<div class="box">
<div class="box-header">

</div>
<!-- /.box-header -->
<div class="box-body">

    <form method="POST" action="{{ route('admin.unidades-de-saude.store') }}" enctype="multipart/form-data">
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



    <div class="form-group{{ $errors->has('nome2') ? ' has-error' : '' }}">
    <label for="nome2">Nome 2</label>
    <input id="nome2" type="text" class="form-control" name="nome2" value="{{ old('nome2') }}" autofocus>
    @if ($errors->has('nome2'))
    <span class="help-block">
    <strong>{{ $errors->first('nome2') }}</strong>
    </span>
    @endif
    </div>




    <div class="form-group{{ $errors->has('nome3') ? ' has-error' : '' }}">
    <label for="nome3">Nome 3</label>
    <input id="nome3" type="text" class="form-control" name="nome3" value="{{ old('nome3') }}" autofocus>
    @if ($errors->has('nome3'))
    <span class="help-block">
    <strong>{{ $errors->first('nome3') }}</strong>
    </span>
    @endif
    </div>



    <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
    <label for="endereco">Endereço</label>
    <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" autofocus>
    @if ($errors->has('endereco'))
    <span class="help-block">
    <strong>{{ $errors->first('endereco') }}</strong>
    </span>
    @endif
    </div>


    <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
    <label for="telefone">Telefone</label>
    <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" autofocus>
    @if ($errors->has('telefone'))
    <span class="help-block">
    <strong>{{ $errors->first('telefone') }}</strong>
    </span>
    @endif
    </div>


    <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
    <label for="avatar">Foto</label><br/>
    <input type="file" name="foto">
    </div>





      <div class="form-group{{ $errors->has('foto_google') ? ' has-error' : '' }}">
      <label for="foto_google">Foto Google</label>
      <input id="foto_google" type="text" class="form-control" name="foto_google" value="{{ old('foto_google') }}" autofocus>
      @if ($errors->has('foto_google'))
      <span class="help-block">
      <strong>{{ $errors->first('foto_google') }}</strong>
      </span>
      @endif
      </div>



    <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
    <label for="latitude">Latitude</label>
    <input id="latitude" type="text" class="form-control" name="latitude" value="{{ old('latitude') }}" autofocus>
    @if ($errors->has('latitude'))
    <span class="help-block">
    <strong>{{ $errors->first('latitude') }}</strong>
    </span>
    @endif
    </div>




    <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
    <label for="longitude">Longitude</label>
    <input id="longitude" type="text" class="form-control" name="longitude" value="{{ old('longitude') }}" autofocus>
    @if ($errors->has('longitude'))
    <span class="help-block">
    <strong>{{ $errors->first('longitude') }}</strong>
    </span>
    @endif
    </div>




    <div class="form-group{{ $errors->has('tipounidade') ? ' has-error' : '' }}">
    <label for="tipounidade">Tipo da Unidade</label>
    <select class="form-control" name="tipounidade" id="tipounidade">
    @foreach($tipos_unidade as $tipo_unidade)
    <option value="{{ $tipo_unidade->id }}">{{ $tipo_unidade->nome }}</option>
    @endforeach
    </select>
    @if ($errors->has('tipounidade'))
    <span class="help-block">
    <strong>{{ $errors->first('tipounidade') }}</strong>
    </span>
    @endif
    </div>




    <div class="form-group{{ $errors->has('regionalunidade') ? ' has-error' : '' }}">
    <label for="regionalunidade">Regional da Unidade</label>
    <select class="form-control" name="regionalunidade" id="regionalunidade">
    @foreach($regionals_unidade as $regional_unidade)
    <option value="{{ $regional_unidade->id }}">{{ $regional_unidade->nome }}</option>
    @endforeach
    </select>
    @if ($errors->has('regionalunidade'))
    <span class="help-block">
    <strong>{{ $errors->first('regionalunidade') }}</strong>
    </span>
    @endif
    </div>


    <div class="form-group{{ $errors->has('esus') ? ' has-error' : '' }}">
    <label for="esus">Link ESUS</label>
    <input id="esus" type="text" class="form-control" name="esus" value="http://{{ old('esus') }}" autofocus>
    @if ($errors->has('esus'))
    <span class="help-block">
    <strong>{{ $errors->first('esus') }}</strong>
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
    <a href="{{ route('admin.unidades-de-saude.index') }}" class="btn btn-default text-capitalize"> Voltar</a>
    <button type="submit" class="btn btn-success text-capitalize"> Salvar</button>
    </div>

    </form>  
    
</div>
</div>

</section>
</div>

@endsection
