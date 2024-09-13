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

     <form method="POST" action="{{ route('admin.sistemas.update', ['sistemas' => $sistema->id]) }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="_method" value="put">

          <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
          <label for="nome">Nome</label>
          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') ?: $sistema->nome }}" required autofocus>
          @if ($errors->has('nome'))
          <span class="help-block">
          <strong>{{ $errors->first('nome') }}</strong>
          </span>
          @endif
          </div>

          <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
          <label for="descricao">Descrição</label>
          <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') ?: $sistema->descricao }}" required autofocus>
          @if ($errors->has('descricao'))
          <span class="help-block">
          <strong>{{ $errors->first('descricao') }}</strong>
          </span>
          @endif
          </div>

          <div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
          <label for="foto">Foto</label><br/>
          <img style="width: 220px;" src="{{ asset('storage/sistemas/'.$sistema->foto.'') }}">
          <input type="file" name="foto">
          </div>


          <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
          <label for="link">Link</label>
          <input id="link" type="text" class="form-control" name="link" value="{{ old('link') ?: $sistema->link }}" required autofocus>
          @if ($errors->has('link'))
          <span class="help-block">
          <strong>{{ $errors->first('link') }}</strong>
          </span>
          @endif
          </div>



          <div class="form-group{{ $errors->has('documentacao') ? ' has-error' : '' }}">
          <label for="status">Documentação</label>
          <br/>

          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-plus-square"></i> @lang('messages.create')
          </button>

          @if ($errors->has('documentacao'))
          <span class="help-block">
          <strong>{{ $errors->first('documentacao') }}</strong>
          </span>
          @endif


          <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
          <th>Título</th>
          <th>Tipo Documentação</th>
          <th>Status</th>
          <th>Opções</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($documentacoes as $documentacao)
          <tr>
          <td>{{ $documentacao->titulo }}</td>
          <td>{{ $documentacao->tipodocumentacao->titulo }}</td>
          <td>
          @if (($documentacao->statu->id) === 1)
          <small class="label bg-green">{{ $documentacao->statu->nome }}</small></td>
          @else
          <small class="label bg-red">{{ $documentacao->statu->nome }}</small></td>
          @endif
          <td style="width:8%;">

          <a  data-toggle="tooltip" data-placement="top" title="@lang('messages.edit')" title="@lang('messages.edit')" class="btn btn-sm btn-primary" href="{{ route('admin.documentacao.edit',$documentacao->id) }}"><i class="fas fa-edit"></i></a>

          <form onsubmit="return confirm('@lang('messages.confirm_delete')');" id="deleteitem-{{ $documentacao->id }}" action="{{ route('admin.documentacao.destroy', ['documentacao' => $documentacao->id]) }}" method="POST" style="display: inline;">
          @csrf
          <input type="hidden" name="_method" value="delete">
          <button type="submit" data-toggle="tooltip" data-placement="top" title="@lang('messages.delete')" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
          </form>

          </td>
          </tr>
          @endforeach
          </tbody>
          </table>



          </div>



                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="status">Status</label>
                <select class="form-control" name="status_id" id="status">
                @foreach($status as $stat)
                <option @if ($sistema->status_id == $stat->id) selected @endif value="{{ $stat->id }}">{{ $stat->nome }}</option>
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
          <input id="created_at" type="text" readonly class="form-control" name="created_at" value="{{ old('created_at') ?: $sistema->created_at }}" required autofocus>
          @if ($errors->has('created_at'))
          <span class="help-block">
          <strong>{{ $errors->first('created_at') }}</strong>
          </span>
          @endif
          </div>


          <div class="form-group{{ $errors->has('updated_at') ? ' has-error' : '' }}">
          <label for="updated_at">Alterado em</label>
          <input id="updated_at" type="text" readonly class="form-control" name="updated_at" value="{{ old('updated_at') ?: $sistema->updated_at }}" required autofocus>
          @if ($errors->has('updated_at'))
          <span class="help-block">
          <strong>{{ $errors->first('updated_at') }}</strong>
          </span>
          @endif
          </div>

          </div><!-- body-->

          <div class="modal-footer">
          <a href="{{ route('admin.sistemas.index') }}" class="btn btn-default text-capitalize"> @lang('messages.goback')</a>
          <button type="submit" class="btn btn-success text-capitalize">  @lang('messages.save')</button>
          </div>
    </form>  



<!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Documentação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <form method="POST" action="{{ route('admin.documentacao.store') }}" enctype="multipart/form-data">
                @csrf

                  <input type="hidden" value="{{$sistema->id}}" name="sistema_id" required autofocus>

                  <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                  <label for="titulo">Título</label>
                  <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required autofocus>
                  @if ($errors->has('titulo'))
                  <span class="help-block">
                  <strong>{{ $errors->first('titulo') }}</strong>
                  </span>
                  @endif
                  </div>

                  <div class="form-group{{ $errors->has('tipo_documentacao') ? ' has-error' : '' }}">
                  <label for="tipo_documentacao">Tipo de Documentação</label>
                  <select class="form-control" name="tipo_documentacao" id="tipo_documentacao">
                  @foreach($tipo_documentacoes as $tipo_documentacao)
                  <option value="{{ $tipo_documentacao->id }}">{{ $tipo_documentacao->titulo }}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('tipo_documentacao'))
                  <span class="help-block">
                  <strong>{{ $errors->first('tipo_documentacao') }}</strong>
                  </span>
                  @endif
                  </div>


                  <div class="form-group{{ $errors->has('arquivo') ? ' has-error' : '' }}">
                  <label for="arquivo">Arquivo</label><br/>
                  <input type="file" name="arquivo">
                  @if ($errors->has('arquivo'))
                  <span class="help-block">
                  <strong>{{ $errors->first('arquivo') }}</strong>
                  </span>
                  @endif
                  </div>


                  <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
                  <label for="video">Vídeo <small>(Vídeo deve já estar armazenado no servidor)</small></label>
                  <input id="video" type="text" class="form-control" name="video" value="{{ old('video') }}" required autofocus>
                  @if ($errors->has('video'))
                  <span class="help-block">
                  <strong>{{ $errors->first('video') }}</strong>
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

                  </div>


                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.close')</button>
                  <button type="submit" class="btn btn-success">@lang('messages.save')</button>
                  </div>
                </form>
                </div>
                </div>
                </div>
              <!-- Modal -->


</div>
</div>





</section>
</div>

@endsection
