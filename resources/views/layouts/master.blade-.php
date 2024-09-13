<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/favicon.ico">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- FONT AWESOME -->
    <link href="{{ asset('css/web-fonts-with-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- dynamic styles -->
    <link rel="stylesheet" href="{{ asset('lib/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    
    @yield('googlemaps_style')
    @yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120632922-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-120632922-1');
    </script>


    </head>
    <body>  
    @include('layouts._header')
    @include('layouts._nav')
    <div class="spacer text-muted">
      <div class="container">
        @yield('content') 
      </div>
    </div>
    @include('layouts._footer')

   


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>

    <script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
    <script src="{{ asset('lib/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.datatable').DataTable({
                "language": {
                    "paginate": {
                        "first":      "Primeiro",
                        "last":       "Última",
                        "next":       "Próxima",
                        "previous":   "Anterior",
                    },
                "search": "Procurar",
                "lengthMenu": "Mostrando _MENU_ dados por página",
                "zeroRecords": "Desculpe, nada encontrado verifique a digitação",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Não há dados",
                "infoFiltered": "(filtrando de _MAX_ total dados)",
            },
              
            'responsive'  : true,
            'ordering'    : false,
            'paging'      : true,
            'lengthChange': false,
            'searching'   : true,
            'info'        : true,
            'autoWidth'   : true
        });

    });
    </script>


    @yield('googlemaps_js')
  </body>
</html>
