@extends('layouts.admin._master')

@section('datatable_css')
<link rel="stylesheet" href="{{ asset('lib/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@stop

@section('datatable_js')
<script src="{{ asset('lib/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lib/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'ordering'    : false,
      'paging'      : false,
      'lengthChange': true,
      'searching'   : true,
      'info'        : true,
      'autoWidth'   : false
    })
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

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>Cod</th>
<th>Nome</th>
<th>Email</th>
<th>Acessos</th>
<th>Opções</th>
</tr>
</thead>
<tbody>
@foreach ($usuarios as $usuario)
<tr>
<td>{{ $usuario->id }}</td>
<td>{{ $usuario->name }}</td>
<td>{{ $usuario->email }}</td>
<td>
@if ($usuario->ac_intranet)
 Intranet
@endif

@if ($usuario->ac_helpdesk)
 Helpdesk
@endif

@if ($usuario->ac_reqobra)
 Reqobra
@endif
</td>
<td style="width:8%;">

<a  data-toggle="tooltip" data-placement="top" title="@lang('messages.edit')" title="@lang('messages.edit')" class="btn btn-sm btn-primary" href="{{ route('admin.usuarios.edit',$usuario->id) }}"><i class="fas fa-edit"></i></a>

<form onsubmit="return confirm('@lang('messages.confirm_delete')');" id="deleteitem-{{ $usuario->id }}" action="{{ route('admin.usuarios.destroy', ['usuario' => $usuario->id]) }}" method="POST" style="display: inline;">
@csrf
<input type="hidden" name="_method" value="delete">
<button type="submit" data-toggle="tooltip" data-placement="top" title="@lang('messages.delete')" class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>




@if (session('status'))
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>{{ session('status') }}</strong>
</div>
@endif


<div class="text-right">
<a href="{{ route('admin.usuarios.create')}}" type="submit" class="btn btn-success">@lang('messages.create')</a>
</div>

</div>
</div>

</section>
</div>


<!-- DataTables -->

@endsection
