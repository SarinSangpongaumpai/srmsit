 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Calendar
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">


          <div class="row">
            <div id="map"></div>
            <script>

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
    </div>
  </section>
</div>
</div>

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