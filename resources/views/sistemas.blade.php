@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-8 col-12">
      <h5 class="default-header"><i class="fas fa-desktop"></i> SISTEMAS</h5>
      <div class="row">
       



		            
		<div class="modal fade" id="EsusModal" tabindex="-1" role="dialog" aria-labelledby="esusModalLabel" aria-hidden="true">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header">
		          <h5 class="modal-title" id="esusModalLabel">e-SUS</h5>
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span>
		          </button>
		        </div>
		        <div class="modal-body">
		          
		          <table style="width: 100%;" id="esus" class="datatable table table-bordered table-striped">
		          <thead>
		          <tr>
		          <th>Unidade</th>
		          <th>ESUS</th>
		          </tr>
		          </thead>
		          <tbody>
		            


		          @foreach ($unidadessaude as $unidadesaude)
		          @if($unidadesaude->esus)
		            <tr>
		            <td>{{ $unidadesaude->nome }}</td>
		            <td>
		              <a target="_blank" href="{{ $unidadesaude->esus }}" class="btn btn-sm btn-block btn-success text-white"><i class="fas fa-external-link-square-alt"></i> Acessar</a>
		            </td>
		            </tr>
		          @endif
		          @endforeach
		  
		          </tbody>
		          </table>
		  
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		        </div>
		      </div>
		    </div>
		</div>



         @foreach ($sistemas as $sistema)
         <div class="col-md-4 col-12">
            <div class="card bottom-mg10">
               <div class="card-div">
                  <img class="card-img-top" src="{{ asset('storage/sistemas/'.$sistema->foto.'') }}" alt="Card image cap">
               </div>
               <div class="card-body">
                  <h5 class="card-title">{{ $sistema->nome }}</h5>
                  <p class="card-text">{{ $sistema->descricao }}</p>
                  <a target="_blank" href="{{ $sistema->link }}" class="btn btn-sm btn-block btn-primary text-white"><i class="fas fa-external-link-square-alt"></i> Acessar</a>
                  <a href="{{url('sistemas/'.$sistema->id.'')}}" class="btn btn-sm btn-block btn-secondary text-white"><i class="fas fa-book"></i> Documentação</a>
               </div>
            </div>
         </div>
         @endforeach
      
      
      </div>
      <!-- row -->
      {{ $sistemas->links() }}
      
   </div>
   <div class="col-md-4 col-12">
      @include("layouts._right_column")
   </div>
</div>
</div>
@endsection
