@extends('layouts.master')
@section('content')
<div class="row">
   <div class="col-md-8 col-12 text-dark">
      <h5 class="default-header"><i class="fab fa-accessible-icon"></i> ACESSIBILIDADE</h5>
      


  		<br/>

		<h6> O mapa do site é a representação gráfica da estrutura do site, que mostra a distribuição do conteúdo por áreas e o caminho mais simples a ser percorrido para se chegar a cada informação.</h6>
		<hr/>


		<ul>
		<li><a class="text-dark" href="/noticias"><strong>Notícias</strong></a></li>   
		<li><a class="text-dark" href="/comunicados"><strong>Comunicados</strong></a></li> 
		<li><a class="text-dark" href="/eventos"><strong>Eventos</strong></a></li>  
		<li><a class="text-dark" href="#"><strong>Unidades</strong></a></li>
		<ul>
		<li><a class="text-dark" href="/unidades-de-saude/lista-de-unidades">Lista de Unidades</a></li>
		<li><a class="text-dark" href="/unidades-de-saude/mapa-de-unidades">Mapa de Unidades</a></li>
		</ul>

		<li><a class="text-dark" href="/organograma"><strong>Organograma</strong></a></li>
		<li><a class="text-dark" href="/sistemas"><strong>Sistemas</strong></a></li>  
		<li><a class="text-dark"  href="/downloads"><strong>Downloads</strong></a></li>
		</ul>   
    


   </div>
   <div class="col-md-4 col-12">
      @include("layouts._right_column")
   </div>
</div>
</div>
@endsection