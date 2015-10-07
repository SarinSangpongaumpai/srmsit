<?php 
      if(isset($range)){
          $radius = $range;
       }
       else{
          $radius = 1000;
       }
       $circle = $radius*1.2;
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>School Map</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i> Home</a></li>
      <li class="active"><a href="#"><i class="fa fa-map-marker"></i>Map</a></li>     
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-body">
            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
            <div class=""id="map"></div>
            <br>

            <div class="col-sm-4">  
              <a href="#tableAll" data-toggle="modal" class="btn bg-blue btn btn-default btn-block btn-flat"><b>View School</b></a>
            </div>
            <div class="col-sm-4">
              <a href="#mapmodals" data-toggle="modal" class="btn bg-blue btn btn-default btn-block btn-flat"><b>Save School's Location</b></a>
            </div>
            <div class="col-sm-4">
              <a href="#rangeMap" data-toggle="modal" class="btn bg-blue btn btn-default btn-block btn-flat"><b>Search School in Radius</b></a>
            </div>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->

<div class="modal fade" id="tableAll">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">List of school in range</h4>
      </div>
        <div class="modal-body">
           <div id="results" class="position:relative" style="height:500px;overflow: scroll;">
              <table id="example1"class="table">
                <thead><tr>
                 <th>ลำดับ</th>
                 <th>โรงเรียน</th>
                 </tr></thead>
                <tbody id="places"></tbody>
                <tfoot></tfoot>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<div class="modal fade" id="mapmodals">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">School's Location</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('map/addSchool'); ?>
        <div class="body ">
          <div class="input-group"><span class="input-group-addon"><i class="fa fa-university"></i></span>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div><br>
          <div class="input-group"><span class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
            <input type="text" class="form-control" id="location" name="location" placeholder="Location">
          </div><br>
          <div class="input-group"><span class="input-group-addon"><i class="fa fa-code"></i></span>
            <input type="text" class="form-control" id="code" name="code" placeholder="Code">
          </div><br>
          <div class="input-group"><span class="input-group-addon"><i class="fa fa-flag-o"></i></span>
            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude">
          </div><br>
          <div class="input-group"><span class="input-group-addon"><i class="fa fa-flag"></i></span>
            <input type="text" class="form-control" id="longtitude" name="longtitude" placeholder="longtitude">
          </div><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      <?php echo form_close();?>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

  
<div class="modal fade" id="rangeMap">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Search School in Range(Meters)</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('map/searchRange'); ?>
        <div class="body ">
          <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" id="range" name="range" placeholder="Please input bettween 1 - 50,000">
          </div><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
var map;

function initMap() {
  var pyrmont = {lat: 13.6523831, lng: 100.49387189999993};

  map = new google.maps.Map(document.getElementById('map'), {
    center: pyrmont,
    zoom: 14
  });
  
  placeKMUTT();

  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });
  
  var markers = [];
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {

    createMarker(place);
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });


  infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: pyrmont,
    radius: <?php echo $radius ?>,
    types: ['school']
  }, processResults);
}
function placeKMUTT(){
  var image = '../img/university.png';
  var beachMarker = new google.maps.Marker({
    position: {lat: 13.6523831, lng: 100.49387189999993} ,
    map: map,
    icon: image,
    title: 'King Mongkut’s University of Technology Thonburi'
  });

      google.maps.event.addListener(beachMarker, 'click', function() {
        infowindow.setContent("King Mongkut’s University of Technology Thonburi<br>126 ถนน ประชาอุทิศ กรุงเทพมหานคร Thung Khru 10140");
        infowindow.open(map, this);
      });
  <?php 
    if(false !== ($DBSchool)){
          foreach($DBSchool as $DBSchool){
             $name = $DBSchool->name;
             $location = $name."<br>".$DBSchool->location;
             $latitude = $DBSchool->latitude;
             $longitude = $DBSchool->longitude;

  ?>
  var beachMarker = new google.maps.Marker({
    position: {lat: <?php echo $latitude?>, lng: <?php echo $longitude?>} ,
    map: map,
    icon: image,
    title: "<?php echo $name ?>"
  });

      google.maps.event.addListener(beachMarker, 'click', function() {
        infowindow.setContent('<?php echo $location ?>');
        infowindow.open(map, this);
      });
  <?php
           }
       }
  ?>

  var cityCircle = new google.maps.Circle({
      clickable: true,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: map.center,
      radius: <?php echo $circle ?>
  });
}
function processResults(results, status, pagination) {
  if (status !== google.maps.places.PlacesServiceStatus.OK) {
    return;
  } else {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }/*
    if (pagination.hasNextPage) {
      var moreButton = document.getElementById('more');

      moreButton.disabled = false;

      moreButton.addEventListener('click', function() {
        moreButton.disabled = true;
        pagination.nextPage();
      });

    }
    */
  }
}
var count = 1;
function createMarker(place) {
  var placeLoc = place.geometry.location;
  var placesList = document.getElementById('places');
  var nameBox = document.getElementById('name');
  var placeBox = document.getElementById('location');
  var latitudeBox = document.getElementById('latitude');
  var longtitudeBox = document.getElementById('longtitude');
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  }); 
  
  var request = { reference: place.reference };
  var service = new google.maps.places.PlacesService(map);
  var schoolDetail = "";
    service.getDetails(request, function(details, status) {
      google.maps.event.addListener(marker, 'click', function() {
        schoolDetail = details.formatted_address;
        /*
        if(count > 0){
          count = 0;
          document.getElementById("places").deleteRow(0);
        }
        */
        nameBox.value = place.name;
        placeBox.value = details.formatted_address;
        latitudeBox.value = place.geometry.location.lat();
        longtitudeBox.value = place.geometry.location.lng();
        count = count+1;
        infowindow.setContent(place.name + "<br />" + details.formatted_address  + "<br />" + details.formatted_phone_number);
        infowindow.open(map, this);
      });
      
    });
    placesList.innerHTML += '<td>' + count +'</td><td>'+ place.name  +'</td>';
    count = count+1;
}

    </script>
        <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initMap" async defer></script>


<style>
  #map {  height: 400px;  width: 100%;  }
  .controls {
    margin-top: 10px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  }
  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 300px;
  }
  #pac-input:focus {
    border-color: #4d90fe;
  }
  .pac-container {
    font-family: Roboto;
  }
  #type-selector {
    color: #fff;
    background-color: #4d90fe;
    padding: 5px 11px 0px 11px;
  }
  #type-selector label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }
   #target {
          width: 345px;
  }
</style>