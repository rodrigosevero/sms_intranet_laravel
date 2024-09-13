<footer class="mainfooter">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-12">
            <img src="{{ asset('img/footer-logo.png') }}">
         </div>
         <div class="col-md-4 col-12 footer-list">
            <h5 class="text-white">Secretaria Municipal de Saúde</h5>
            <ul>
               <li><a href="{{ url('/noticias') }}">Notícias</a></li>
               <li><a href="{{ url('/unidades-de-saude/lista-de-unidades') }}">Unidades de Saúde</a></li>
               <li><a href="{{ url('/organograma') }}">Organograma</a></li>
               <li><a href="{{ url('/sistemas') }}">Sistemas</a></li>
               <li><a href="{{ url('/downloads') }}">Downloads</a></li>
            </ul>
         </div>
         <div class="col-md-2 col-12 footer-list">
            <h5 class="text-white">Navegação</h5>
            <ul>
               <li><a href="{{ url('/acessibilidade') }}">Acessibilidade</a></li>
               <li><a href="{{ url('/mapa-do-site') }}">Mapa do site</a></li>
            </ul>
         </div>
      </div>
   </div>

   <div class="subfooter text-right text-shadown">
      <div class="container">
         <small>Desenvolvido pela CTI - SAÚDE</small>
         <!-- wd- Danilo Carvalho 2018-->
      </div>
   </div>
</footer>