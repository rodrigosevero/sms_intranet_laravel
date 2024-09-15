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

     <form method="POST" action="{{ route('admin.unidades-de-saude.update', ['unidades_saude' => $unidade_saude->id]) }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_method" value="put">

          <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
          <label for="nome">Nome</label>
          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') ?: $unidade_saude->nome }}" required autofocus>
          @if ($errors->has('nome'))
          <span class="help-block">
          <strong>{{ $errors->first('nome') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('nome2') ? ' has-error' : '' }}">
          <label for="nome2">Nome 2</label>
          <input id="nome2" type="text" class="form-control" name="nome2" value="{{ old('nome2') ?: $unidade_saude->nome2 }}"  autofocus>
          @if ($errors->has('nome2'))
          <span class="help-block">
          <strong>{{ $errors->first('nome2') }}</strong>
          </span>
          @endif
          </div>




          <div class="form-group{{ $errors->has('nome3') ? ' has-error' : '' }}">
          <label for="nome3">Nome 3</label>
          <input id="nome3" type="text" class="form-control" name="nome3" value="{{ old('nome3') ?: $unidade_saude->nome3 }}"  autofocus>
          @if ($errors->has('nome3'))
          <span class="help-block">
          <strong>{{ $errors->first('nome3') }}</strong>
          </span>
          @endif
          </div>

          <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
          <label for="endereco">Endereço</label>
          <input id="endereco" type="text" class="form-control" name="endereco" value="{{ old('endereco') ?: $unidade_saude->endereco }}" autofocus>
          @if ($errors->has('endereco'))
          <span class="help-block">
          <strong>{{ $errors->first('endereco') }}</strong>
          </span>
          @endif
          </div>


         
          <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
          <label for="telefone">Telefone</label>
          <input id="telefone" type="text" class="form-control" name="telefone" value="{{ old('telefone') ?: $unidade_saude->telefone }}" autofocus>
          @if ($errors->has('telefone'))
          <span class="help-block">
          <strong>{{ $errors->first('telefone') }}</strong>
          </span>
          @endif
          </div>



          <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
          <label for="avatar">Foto</label><br/>
          <img style="width: 220px;" src="{{ asset('storage/unidades/'.$unidade_saude->foto.'') }}">
          <input type="file" name="foto">
          </div>



          <div class="form-group{{ $errors->has('foto_google') ? ' has-error' : '' }}">
          <label for="foto_google">Foto Google</label>
          <input id="foto_google" type="text" class="form-control" name="foto_google" value="{{ old('foto_google') ?: $unidade_saude->foto_google }}" autofocus>
          @if ($errors->has('foto_google'))
          <span class="help-block">
          <strong>{{ $errors->first('foto_google') }}</strong>
          </span>
          @endif
          </div>




          <div class="form-group{{ $errors->has('latitude') ? ' has-error' : '' }}">
          <label for="latitude">Latitude</label>
          <input id="latitude" type="text" class="form-control" name="latitude" value="{{ old('latitude') ?: $unidade_saude->latitude }}"  autofocus>
          @if ($errors->has('latitude'))
          <span class="help-block">
          <strong>{{ $errors->first('latitude') }}</strong>
          </span>
          @endif
          </div>



          <div class="form-group{{ $errors->has('longitude') ? ' has-error' : '' }}">
          <label for="longitude">Longitude</label>
          <input id="longitude" type="text" class="form-control" name="longitude" value="{{ old('longitude') ?: $unidade_saude->longitude }}"  autofocus>
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
          <option @if ($unidade_saude->tipounidade_id == $tipo_unidade->id) selected @endif value="{{ $tipo_unidade->id }}">{{ $tipo_unidade->nome }}</option>
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
         <option @if ($unidade_saude->regionalunidade_id == $regional_unidade->id) selected @endif value="{{ $regional_unidade->id }}">{{ $regional_unidade->nome }}</option>
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
          <input id="esus" type="text" class="form-control" name="esus" value="{{ old('esus') ?: $unidade_saude->esus }}"  autofocus>
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
          <option @if ($unidade_saude->status_id == $stat->id) selected @endif value="{{ $stat->id }}">{{ $stat->nome }}</option>
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
          <input id="created_at" type="text" readonly class="form-control" name="created_at" value="{{ old('created_at') ?: $unidade_saude->created_at }}" required autofocus>
          @if ($errors->has('created_at'))
          <span class="help-block">
          <strong>{{ $errors->first('created_at') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('updated_at') ? ' has-error' : '' }}">
          <label for="updated_at">Alterado em</label>
          <input id="updated_at" type="text" readonly class="form-control" name="updated_at" value="{{ old('updated_at') ?: $unidade_saude->updated_at }}" required autofocus>
          @if ($errors->has('updated_at'))
          <span class="help-block">
          <strong>{{ $errors->first('updated_at') }}</strong>
          </span>
          @endif
          </div>

          </div><!-- body-->

          <div class="modal-footer">
          <a href="{{ route('admin.unidades-de-saude.index') }}" class="btn btn-default text-capitalize"> @lang('messages.goback')</a>
          <button type="submit" class="btn btn-success text-capitalize">  @lang('messages.save')</button>
          </div>
    </form>  

</div>
</div>

</section>
</div>
@endsection
