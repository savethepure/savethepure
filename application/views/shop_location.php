<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php include('static/helmet.php'); ?>

<?php include('static/header.php'); ?>

<title>Save The Pure | Shop Location</title>
<style>
	#map-canvas {
	  	width:100%;
	    height:400px;
	    right:0;
	    top:0;
	    bottom:0;
	    overflow:hidden;
	}
</style>
<div class="wrapper-container u-py3">
    <hr>
        <h2 class="center mt1">Shop Location</h2>
    <hr>

    <div class="center">
        <div id="map-canvas" class="col-12"></div>
        <div class="lokasi center mt3">
        	<p>Kami berlokasi di Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias inventore culpa corporis suscipit tenetur dolorum autem, quod doloribus dolor labore quibusdam repellendus voluptas quia esse sequi similique dicta rerum? Minima.</p>
        </div>
    </div>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQR1oTLBImon1kkDZMbIyysEHwTnYYij4&callback=initMap"
  type="text/javascript"></script>
<script>
	jQuery(document).ready(function($) {
  $(document).ready(function() { /* google maps -----------------------------------------------------*/
    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {

      /* position Chicago */
      var latlng = new google.maps.LatLng(-6.1447987, 106.8464972);
      var mapOptions = {
        zoomControl: true,
        zoomControlOptions: {
          position:         
          google.maps.ControlPosition.LEFT_TOP
          },
        center: latlng,
        scrollwheel: false,
        zoom: 19,
        /* More styles at https://snazzymaps.com */
        styles: [{
          "featureType": "landscape",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 65
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "poi",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 51
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road.highway",
          "stylers": [{
            "saturation": -100
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road.arterial",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 30
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "road.local",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 40
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "transit",
          "stylers": [{
            "saturation": -100
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "administrative.province",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "water",
          "elementType": "labels",
          "stylers": [{
            "visibility": "on"
          }, {
            "lightness": -25
          }, {
            "saturation": -100
          }]
        }, {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [{
            "hue": "#ffff00"
          }, {
            "lightness": -25
          }, {
            "saturation": -97
          }]
        }]

        /* End Styles */
      };

// Create our info window content   
    var infoWindowContent = '<div class="info_content">' +
        '<h3>My Location</h3>' +
        '<p>This is where you put information about this address</p>' +
    '</div>';

    // Initialise the inforWindow
    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });
      
      var marker = new google.maps.Marker({
        position: latlng,
        url: '/',
        animation:
        google.maps.Animation.DROP
      });
    // Display our info window when the marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.open(map, marker);
    });
      
      var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
      marker.setMap(map);
    };
    /* end google maps -----------------------------------------------------*/
  });
});
</script>

