
<style>
  #map-container { height: 400px }
.myInfobox {
        border: solid 1px black;
        background-color:rgba(255, 255, 255, 0.5);
        width: 280px;
        color: #000;
        font-family: Arial;
        font-size: 14px;
        padding: .5em 1em;
        border-radius: 10px;
        margin-left: -30px;
        margin-top: -6px
    }
</style>

<div class="container">
<div class="row">
<a href="#mapmodals" data-toggle="modal" role="button"><img src="04_maps.png" width="64" height="64" alt="map Venice" title="click to open Map"></a></p>  
    </div>
  </div> <!-- /column 2 -->
</div> <!-- /row -->
 
<!-- Modal -->
  <div class="modal fade" id="mapmodals">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Peggy Guggenheim Collection - Venice</h4>
        </div>
        <div class="modal-body">
          <div id="map-container"></div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div><!-- /container -->
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox.js"></script>
<script>
      var var_map;
        var var_location = new google.maps.LatLng(13.652383100000000,100.493871900000000);
  
     function map_init() {      
      
            var var_mapoptions = {
              center: var_location,
              zoom: 18,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              mapTypeControl: false,
              panControl:false,
              rotateControl:false,
              streetViewControl: false,
            };
      
        var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
  
      //var mappin = "Pin-icon.png"
      var var_marker = new google.maps.Marker({
        map: var_map,
        draggable: false,
        //icon: mappin,
        position: var_location,
        title: "Click on this Pin to re-open Infobox",
        maxWidth: 200,
        maxHeight: 200,
        visible: true
      });
       
      var var_infobox_props = {
         content: "<strong>Peggy Guggenheim Collection</strong><br><br>Dorsoduro, 701-704<br>30123<br>Venezia<br>P: (+39) 041 240 5411<br><br><a href='http://www.guggenheim.org/venice' target='_blank' style='color:darkblue'>Plan your visit</a>"
        ,disableAutoPan: false
        ,maxWidth: 0
        ,pixelOffset: new google.maps.Size(-10, 0)
        ,zIndex: null
        ,boxClass: "myInfobox"
        ,closeBoxMargin: "2px"
        //,closeBoxURL: "close_sm.png"
        ,infoBoxClearance: new google.maps.Size(1, 1)
        ,visible: true
        ,pane: "floatPane"
        ,enableEventPropagation: false
      };
 
          google.maps.event.addListener(var_marker, 'click', function(e) {
           var_infobox.open(var_map, this);
          });
      
      var var_infobox = new InfoBox(var_infobox_props);
  
        //var_infobox.open(var_map, var_marker);
      
      }
      
        google.maps.event.addDomListener(window, 'load', map_init);
      
      //start of modal google map
      $('#mapmodals').on('shown.bs.modal', function () {
          google.maps.event.trigger(var_map, "resize");
          var_map.setCenter(var_location);
      });
</script>

<!--
<style>
      #map {
        height: 80%;
      }
    </style>
    <script>
var map;
var infowindow;

function initMap() {
  var pyrmont = {lat: 13.6523831, lng: 100.49387189999993};
  
  map = new google.maps.Map(document.getElementById('map'), {
    center: pyrmont,
    zoom: 14
  });
  var image = '../img/university.png';
  var beachMarker = new google.maps.Marker({
    position: {lat: 13.6523831, lng: 100.49387189999993} ,
    map: map,
    icon: image,
    title: 'King Mongkut’s University of Technology Thonburi'
  });
  var cityCircle = new google.maps.Circle({
      clickable: false,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: map.center,
      radius: 5000
  });
  infowindow = new google.maps.InfoWindow();
  
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: pyrmont,
    radius: 2000,
    types: ['school']
  }, callback);


}

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placesList = document.getElementById('places');
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    title: place.name,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
  placesList.innerHTML += '<li>' + place.name + '</li>';

}

    </script>

    <style>
      #results {
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        right: 5px;
        top: 60%;
        margin-top: -195px;
        height: 330px;
        width: 200px;
        padding: 5px;
        z-index: 5;
        border: 1px solid #999;
        background: #fff;
      }
      h2 {
        font-size: 22px;
        margin: 0 0 5px 0;
      }
      ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        height: 271px;
        width: 200px;
        overflow-y: scroll;
      }
      li {
        background-color: #f1f1f1;
        padding: 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
      }
      li:nth-child(odd) {
        background-color: #fcfcfc;
      }
      #more {
        width: 100%;
        margin: 5px 0 0 0;
      }
    </style>
  </head>
  <body>
    -->
    <!--
    <div id="results" class="panel">
      <h2>Results</h2>
      <ul id="places"></ul>
      <button id="more">More results</button>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initMap" async defer></script>
  </body>

  -->