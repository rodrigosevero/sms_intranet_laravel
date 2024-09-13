<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/favicon.ico">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Giovanny Montinny -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <!-- FONT AWESOME -->
    <link href="{{ asset('css/web-fonts-with-css/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- dynamic styles background-image: url("http://intranet/img/tela.jpg")-->
    <link rel="stylesheet" href="{{ asset('lib/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <style>
            .modal-body {
                
            }
            .modal-dialog {
                width: 100%;
                height: 720px;
                margin-left: auto;
                margin-right: auto;
                max-width: 640px;
                max-height: 720px;
            }
            .modal-content {
                height: auto;
                min-height: 100%;
                border-radius: 0;
            }            
   </style> 
    
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
                        "last":       "�ltima",
                        "next":       "Pr�xima",
                        "previous":   "Anterior",
                    },
                "search": "Procurar",
                "lengthMenu": "Mostrando _MENU_ dados por p�gina",
                "zeroRecords": "Desculpe, nada encontrado verifique a digita��o",
                "info": "Mostrando p�gina _PAGE_ de _PAGES_",
                "infoEmpty": "N�o h� dados",
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

        $('#myModal').modal();
              setTimeout(function(){
                  $('#myModal').modal('hide');
        }, 180000);    

        $('#TelefoneModal').on('shown.bs.modal', function (e) {
            $(".modal-body").css('background-image', 'none');
        })            

    });
    </script>

<!--
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfecsoYFsPdKU_CRb29dIDI4IuXUJg3t0pa4P6tDKxN36KJLA/viewform?embedded=true" width="640" height="3735" frameborder="0" marginheight="0" marginwidth="0">Carregando�</iframe>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
   </div>
-->
    @yield('googlemaps_js')
  </body>
</html>
