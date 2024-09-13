@extends('layouts.master')

@section('googlemaps_style')
<link rel="stylesheet" href="{{ asset('css/googlemaps.css') }}">
@stop

@section('googlemaps_js')




<!-- google maps clustering -->
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEff2w6Ohl8lmPp_-06Ou0rKLdwh2X0ws&callback=speedTest.init"
async defer></script>

<script src="/unidades-de-saude/search?unidade={{$termo}}{{'&regional='.$termo2}}"></script>
<script type="text/javascript" src="{{ asset('js/markerclusterer.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/speed_test.js') }}"></script>
<script>
google.maps.event.addDomListener(window, 'load', speedTest.init);
</script>
<!-- google maps clustering -->


<script>
var map;
var head = document.getElementsByTagName('head')[0];
// Save the original method
var insertBefore = head.insertBefore;
// Replace it!
head.insertBefore = function (newElement, referenceElement) {

if (newElement.href && newElement.href.indexOf('https://fonts.googleapis.com/css?family=Roboto') === 0) {
 return;
}
insertBefore.call(head, newElement, referenceElement); };
function initMap() {
map = new google.maps.Map(document.getElementById('map'), {
center: {lat: -34.397, lng: 150.644},
 zoom: 8
});
}
</script>

@stop

@section('content')
<div class="row">
<div class="col-md-12 col-12">
   

<h5 class="default-header"><i class="fas fa-hospital"></i> UNIDADES DE SAÚDE <i class="fas fa-arrow-right"></i> <i>MAPA DE UNIDADES</i></h5>


<div id="load-map" class="col s12 white content-holder"> <!-- google maps -->
<div class="row"> <!-- row -->


      <div class="search-box">
         <form method="GET" action="{{ route('unidades-de-saude.mapa-de-unidades') }}" enctype="multipart/form-data">
   			 @csrf
            <div class="form-group">
               <label for="exampleInputPassword1">Pesquisar Unidade</label>
               <input value="{{ isset($_GET['regional']) ? $_GET['regional'] : '' }}" type="hidden" name="regional" id="regional">
               <input value="{{ isset($_GET['unidade']) ? $_GET['unidade'] : '' }}" type="text" class="form-control" name="unidade" id="unidade" placeholder="Escreva o nome da unidade">
               <br/>
               <button type="submit" class="btn btn-success">Pesquisar</button>
            </div>
         </form>

      </div>

		<!-- load left panel -->
		<div id="panel" class="col-md-3 col-12"> 
		<div>
		<!-- load left panel -->

		<input style="display: none;" type="checkbox" checked="checked" id="usegmm"/>
		</div>
		<div> <!-- panel -->
		<span style="display: none;">Carregamento: <span id="timetaken"></span> ms</span>
		</div>

		@if(isset($_GET['unidade']) ? $_GET['unidade'] : '')
		<div class="alert alert-warning" role="alert">
		<a href="{{ url('/unidades-de-saude/mapa-de-unidades') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Resetar Pesquisa</a>
		</div>
		@endIf

		<select class="form-control" name="regional" onchange="if (this.value) window.location.href='/unidades-de-saude/mapa-de-unidades?unidade={{$termo}}&regional='+this.value" class="browser-default">
			<option value="0">Todas</option>
		@foreach ($unidade_regionais as $unidade_regional)
			<option @if (!empty($_GET['regional'])) @if ($unidade_regional->id == $_GET['regional']) selected @endif @endIf value="{{ $unidade_regional->id }}">{{ $unidade_regional->nome }}</option>
		@endforeach
		</select>
		<br/>

		


		<div id="markerInfo"><!-- list info count and city -->
		</div><!-- list info count and city -->

		<div id="markerlist">
		</div> 


  	</div><!-- panel -->


	  <div class="col s9 m9" style="padding: 0 0rem;"> <!-- loads map -->
	    <div id="map-container">
	      <div id="map">
	      </div>
	    </div>
	  </div> <!-- loads map -->



</div> <!-- row -->
</div> <!-- google maps -->







</div>
</div>







@endsection