/**
 * @fileoverview This demo is used for MarkerClusterer. It will show 100 markers
 * using MarkerClusterer and count the time to show the difference between using
 * MarkerClusterer and without MarkerClusterer.
 * @author Luke Mahe (v2 author: Xiaoxi Wu)
 */





function $(element) {
  return document.getElementById(element);
}

var speedTest = {};
speedTest.pics = null;
speedTest.map = null;
speedTest.markerClusterer = null;
speedTest.markers = [];
speedTest.infoWindow = null;

speedTest.init = function() {

  var latlng = new google.maps.LatLng(-15.601467, -56.096835);
    var options = {
    'zoom': 13,
    'center': latlng,
    'mapTypeId': google.maps.MapTypeId.ROADMAP,
   styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#7c93a3"},{"lightness":"-10"}]},{"featureType":"administrative.country","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"color":"#a0a4a5"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"color":"#62838e"}]},{"featureType":"landscape","elementType":"all","stylers":[{"visibility":"off"},{"lightness":"-29"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"color":"#dde3e3"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#3f4a51"},{"weight":"0.30"},{"visibility":"on"},{"lightness":"74"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"poi.attraction","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"},{"visibility":"on"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#bbcacf"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"lightness":"0"},{"color":"#bbcacf"},{"weight":"0.50"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#a9b4b8"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"invert_lightness":!0},{"saturation":"-7"},{"lightness":"3"},{"gamma":"1.80"},{"weight":"0.01"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.bus","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#a3c7df"}]}] 
    };


    speedTest.map = new google.maps.Map($('map'), options);
    speedTest.pics = data.unidade;

    var useGmm = document.getElementById('usegmm');
    google.maps.event.addDomListener(useGmm, 'click', speedTest.change);

    //speedTest.infoWindow = new google.maps.InfoWindow();

     speedTest.infoWindow = new google.maps.InfoWindow({
      pixelOffset: new google.maps.Size(-2, -40)
     });

    speedTest.showMarkers();

};

speedTest.showMarkers = function() {
  speedTest.markers = [];

  var type = 1;

    type = 0;

  if (speedTest.markerClusterer) {
    speedTest.markerClusterer.clearMarkers();
  }

  var panel = $('markerlist');
  panel.innerHTML = '';

  
  //ger number of rows for that
  var panelInfo = $('markerInfo');
  panelInfo.innerHTML = '';

  var itemInfo = document.createElement('DIV');
  var titleInfo = document.createElement('span');
  titleInfo.className = 'customclass';
  titleInfo.innerHTML = data.count+' unidade(s) encontrada(s).';

  itemInfo.appendChild(titleInfo);
  panelInfo.appendChild(itemInfo);
  //ger number of rows for that



  for (var i = 0; i < data.count; i++) { /* for starts */
    var nome = speedTest.pics[i].unidade_nome; //Get photo title
    var photo = speedTest.pics[i].unidade_foto;

    if (speedTest.pics[i].unidade_foto != null) {
      var photo = speedTest.pics[i].unidade_foto;
    }else{
      var photo = "default-pic.jpg";
    }

    var regional = speedTest.pics[i].unidade_regional;
    var endereco = speedTest.pics[i].unidade_endereco; 
    var setIcon = speedTest.pics[i].unidade_icone; //Get the icon
    var icon = '../storage/unidades/' + setIcon;

    if (endereco === '') { endereco = 'Sem Endereço'; }

    var item = document.createElement('div');
    var title = document.createElement('A');
    item.className = 'markerbox';
    title.href = '#';
    title.className = 'title';
    title.innerHTML = '<div class="markerdetails"><div class="row"><div class="col-md-5 col-12"><img class="img-fluid" style="float:left;" src="../storage/unidades/'+photo+'" class="circle"></div><div class="col-md-7 col-12 nopadding"><span><strong>'+nome+'</strong></span><br/><span class="badge badge-secondary text-uppercase">'+regional+'</span><br/><small>'+endereco+'</small></div></div></div>';
  
    //   title.innerHTML = '<div class="markerdetails"><div class="img"><img style="width:85px;float:left; margin-right:5px;" src="../storage/unidades/'+photo+'" class="circle"></div><span><strong>'+ownerText+'</strong></span><br/>'+
    // '<small style="display:block; margin-top:7px;"">'+regional+'</small><br/><small style="display:block; margin-top:7px;"">'+titleText+'</small>';

    item.appendChild(title);
    panel.appendChild(item);


    var latLng = new google.maps.LatLng(speedTest.pics[i].unidade_latitude,
        speedTest.pics[i].unidade_longitude);


    
    var markerImage = new google.maps.MarkerImage(icon,
        new google.maps.Size(36, 48));


    var marker = new google.maps.Marker({
      'position': latLng,
      'icon': markerImage
    });


    var fn = speedTest.markerClickFunction(speedTest.pics[i], latLng);
    google.maps.event.addListener(marker, 'click', fn);
    google.maps.event.addDomListener(title, 'click', fn);
    speedTest.markers.push(marker);

  } /* for ends */

  window.setTimeout(speedTest.time, 0);
};

speedTest.markerClickFunction = function(pic, latlng) {


  return function(e) {
    e.cancelBubble = true;
    e.returnValue = false;
    if (e.stopPropagation) {
      e.stopPropagation();
      e.preventDefault();
    }


    //On click map, it will zoom to 15
    //speedTest.map.setZoom(16); -tirei zoom
    speedTest.map.setCenter(latlng);
    
    var tipo = pic.unidade_tipo;
    var nome = pic.unidade_nome;
    var regional = pic.unidade_regional;
    var endereco = pic.unidade_endereco;
    var telefone = pic.unidade_telefone;


    if (pic.unidade_foto != null) {
     var photo = pic.unidade_foto;
    }else{
      var photo = "default-pic.jpg";
    }

    var infoHtml = '<div class="info">'+  /* info */
     '<div class="info-head">' + /* head */
        '<div class="info-pic">' +
          '<img style="max-width:220px" src="../storage/unidades/'+photo+'">' +
        '</div>' +
        '<div class="info-owner">' +
          '<br/><div class="block"><span class="unidade-endereco"><small>' + tipo + '</small></span></div>'+
          '<div class="block"><span class="unidade-nome"><strong>' + nome + '</strong></span></div>'+
          '<div class="block"><span class="unidade-regional badge badge-secondary text-uppercase"><b>' + regional + '</b></span></div>'+
          '<div class="block"><span class="unidade-endereco"><b>' + endereco + '</b></span></div>'+
          '<div class="block"><span class="unidade-endereco"><b>' + telefone + '</b></span></div>'+
        '</div>'+
      '</div>'; /* info */

    //set
    speedTest.infoWindow.setContent(infoHtml);
    speedTest.infoWindow.setPosition(latlng);
    speedTest.infoWindow.open(speedTest.map);
  };
};





speedTest.clear = function() {
  $('timetaken').innerHTML = 'cleaning...';
  for (var i = 0, marker; marker = speedTest.markers[i]; i++) {
    marker.setMap(null);
  }
};

speedTest.change = function() {
  speedTest.clear();
  speedTest.showMarkers();
};

speedTest.time = function() {
  $('timetaken').innerHTML = 'timing...';
  var start = new Date();
  if ($('usegmm').checked) {
    speedTest.markerClusterer = new MarkerClusterer(speedTest.map, speedTest.markers, {imagePath: '../img/maps/m'});
  } else {
    for (var i = 0, marker; marker = speedTest.markers[i]; i++) {
      marker.setMap(speedTest.map);
    }
  }

  var end = new Date();
  $('timetaken').innerHTML = end - start;
};















// var latlng;  -CODE TO GET CITY
// latlng = new google.maps.LatLng(-15.594006, -56.100569); // Cuiabá, BR

// new google.maps.Geocoder().geocode({'latLng' : latlng}, function(results, status) {
//     if (status == google.maps.GeocoderStatus.OK) {
//         if (results[1]) {
//             var country = null, countryCode = null, city = null, cityAlt = null;
//             var c, lc, component;
//             for (var r = 0, rl = results.length; r < rl; r += 1) {
//                 var result = results[r];

//                 if (!city && result.types[0] === 'locality') {
//                     for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
//                         component = result.address_components[c];

//                         if (component.types[0] === 'locality') {
//                             city = component.long_name;
//                             break;
//                         }
//                     }
//                 }
//                 else if (!city && !cityAlt && result.types[0] === 'administrative_area_level_1') {
//                     for (c = 0, lc = result.address_components.length; c < lc; c += 1) {
//                         component = result.address_components[c];

//                         if (component.types[0] === 'administrative_area_level_1') {
//                             cityAlt = component.long_name;
//                             break;
//                         }
//                     }
//                 } else if (!country && result.types[0] === 'country') {
//                     country = result.address_components[0].long_name;
//                     countryCode = result.address_components[0].short_name;
//                 }

//                 if (city && country) {
//                     break;
//                 }
//             }

//             console.log("City: " + city + ", City2: " + cityAlt + ", Country: " + country + ", Country Code: " + countryCode);
//         }
//     }
// });




// <img src="images/yuna.jpg" alt="" class="circle">
//       <span class="title">Title</span>
