<!-- <h3>Quarta-feira,<br/><small>2 de maio de 2018</small></h4> -->
<!-- acesso rapido -->
<h5 class="default-header"><i class="far fa-folder-open"></i> ACESSO RÁPIDO</h5>
<div class="row section">
   {{-- <div class="col-4 ac-rapido text-center">
      <a href="https://accounts.google.com/AccountChooser?service=mail&continue=https://mail.google.com/mail/" target="_blank" class="btn btn-default">
      <i class="fa fa-envelope"></i>
      <br/>
      WEBMAIL</a>
   </div>
   <div class="col-4 ac-rapido text-center">
      <a href="http://sistemas.cuiaba.mt.gov.br/portaldoservidor/portal/telainicial.html" target="_blank" class="btn btn-default">
      <i class="fa fa-globe"></i>
      <br/>
      PORTAL <BR/>DO SERVIDOR</a>
   </div>
   <div class="col-4 ac-rapido text-center">
      <a href="{{url('unidades-de-saude/lista-de-unidades/')}}" class="btn btn-default">
      <i class="fas fa-hospital"></i>
      <br/>
      UNIDADES <br/>DE SAÚDE</a>
   </div>
   <div class="col-4 ac-rapido text-center">
      <a href="{{url('downloads/')}}" class="btn btn-default">
      <i class="fas fa-file-word"></i>
      <br/>
      DOCUMENTOS</a>
   </div>
   <div class="col-4 ac-rapido text-center">
      <a href="http://10.61.31.12/" target="_blank" class="btn btn-default">
      <i class="fas fa-headphones"></i>
      <br/>
      HELP DESK</a>
   </div>
   <div class="col-4 ac-rapido text-center">
      <a href="#" data-toggle="modal" data-toggle="modal" data-target="#TelefoneModal" target="_blank" class="btn btn-default">
      <i class="fas fa-phone-square"></i>
      <br/>
      TELEFONES</a>
   </div> --}}
</div>



<div class="modal fade" id="TelefoneModal" tabindex="-1" role="dialog" aria-labelledby="TelefoneModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TelefoneModalLabel">Telefones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table style="width: 100%;" id="telefones" class="datatable table table-bordered table-striped">
        <thead>
        <tr>
        <th>Setor/Unidade</th>
        <th>Telefone</th>
        </tr>
        </thead>
        <tbody>
     
        @foreach ($unidadessaude as $unidadesaude)
        <tr>
        <td>{{ $unidadesaude->nome }}</td>
        <td>{{ $unidadesaude->telefone }}</td>
        </tr>
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







<!-- acesso rapido -->
<!-- comunicados -->
<h5 class="default-header"><i class="fas fa-bullhorn"></i> COMUNICADOS</h5>
<div id="comunicados" class="section">
   <ul class="list-group">
     
      @forelse ($comunicados_sidemenu as $comunicado)
        <li class="list-group-item">
         <small>{{ date('d/m/Y', strtotime($comunicado->created_at->toTimeString())) }}</small><br/>
         <!-- <big><i class="fas fa-exclamation-triangle icon_yellow"></i></big> -->
         <a href="{{url('comunicado/'.$comunicado->id.'')}}"> {{$comunicado->titulo}}</a>
       </li>

       @empty
        <div class="alert alert-warning" role="alert">
         <span>Não há comunicados.</span>
        </div>
      @endforelse

   </ul>
</div>
<!-- comunicados -->
<!-- eventos -->
<h5 class="default-header"><i class="fas fa-calendar-alt"></i> EVENTOS</h5>
<div id="eventos" class="section">
   <ul class="list-group">
     
      @forelse ($eventos_sidemenu as $evento)
      <li class="list-group-item">
         <div class="row">
            <div class="col-md-4 col-12">
               <h2>{{ date('d/m', strtotime($evento->data)) }}</h2>
            </div>
            <div class="col-md-8 col-12 text-uppercase">
               <a href="{{url('evento/'.$evento->id.'')}}"> {{$evento->titulo}}
               <br/>  <small><button class="btn btn-sm btn-success">SAIBA MAIS</button></small>  
               </a>         
            </div>
         </div>
      </li>
      @empty
       <div class="alert alert-warning" role="alert">
         <span>Não há eventos.</span>
        </div>
      @endforelse
     
   </ul>