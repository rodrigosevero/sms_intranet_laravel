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
Orgranograma
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fas fa-home"></i> Home</a></li>
<li class="active">Orgranograma</li>
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
<th>Opções</th>
</tr>
</thead>
<tbody>
@foreach ($organogramas as $organograma)
<tr>
<td>{{ $organograma->id }}</td>
<td>Organograma Padrão</td>
<td style="width:8%;">

<a  data-toggle="tooltip" data-placement="top" title="@lang('messages.edit')" title="@lang('messages.edit')" class="btn btn-sm btn-primary" href="{{ route('admin.organograma.edit',$organograma->id) }}"><i class="fas fa-edit"></i></a>
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



</div>
</div>

</section>
</div>

<!-- DataTables -->
@endsection
