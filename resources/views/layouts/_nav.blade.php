<div class="navbar nav2">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-12">
            <nav class="navbar navbar-expand-lg navbar-light ">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                     <li class="nav-item {{{ (Request::is('/') ? 'active' : '') }}}">
                        <a class="nav-link" href="{{ url('/') }}">INÍCIO </a>
                     </li>
                     <li class="nav-item {{{ (Request::is('noticias') ? 'active' : '') }}}" style="display: none;">
                        <a class="nav-link" href="{{ url('/noticias') }}">NOTÍCIAS</a>
                     </li>
                     <li class="nav-item {{{ (Request::is('comunicados') ? 'active' : '') }}}">
                        <a class="nav-link" href="{{ url('/comunicados') }}">COMUNICADOS</a>
                     </li>
                     <li class="nav-item {{{ (Request::is('eventos') ? 'active' : '') }}}">
                        <a class="nav-link" href="{{ url('/eventos') }}">EVENTOS</a>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Unidades
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item {{{ (Request::is('unidades-de-saude/lista-de-unidades') ? 'active' : '') }}}" href="{{ url('/unidades-de-saude/lista-de-unidades') }}">LISTA DE UNIDADES</a>
                           <a class="dropdown-item {{{ (Request::is('unidades-de-saude/mapa-de-unidades') ? 'active' : '') }}}" href="{{ url('/unidades-de-saude/mapa-de-unidades') }}">MAPA DE UNIDADES</a>
                        </div>
                     </li>
                     <li class="nav-item {{{ (Request::is('organograma') ? 'active' : '') }}}">
                        <a class="nav-link" href="{{ url('/organograma') }}">ORGANOGRAMA</a>
                     </li>
                     <li class="nav-item {{{ (Request::is('sistemas') ? 'active' : '') }}}">
                        <a class="nav-link" href="{{ url('/sistemas') }}">SISTEMAS</a>
                     </li>
                     <li class="nav-item {{{ (Request::is('downloads') ? 'active' : '') }}}">
                        <a class="nav-link" href="{{ url('/downloads') }}">
                        DOWNLOADS
                        </a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
   </div>
</div>