<style>
  #map-container { height: 450px }
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

<!-- Modal -->
  <div class="modal fade" id="mapmodals">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
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
        var var_location = new google.maps.LatLng(
          <?php echo $latitude?>,<?php echo $longitude?>);
  
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
         content: "<strong><?php echo $name ?></strong>"
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




