
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
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

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




    <script src="<?php echo site_url(); ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- Modal -->
  <div class="modal fade" id="changeSchool">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body">
          <div style="height: 300px;overflow: scroll;">
            <?php if(false !== ($allSchool)){
                      foreach($allSchool as $allSchool){
                      $name= $allSchool->name;
                      $code= $allSchool->school_code;
            ?>
            <div class="input-group">
              <span class="input-group-addon">
                <button class="btn-default"onclick="location.href='<?php echo base_url()?>summaryReport/school?Place=<?php echo $code?>'"
                style="position:relative;text-align:left;padding: 0;border:none;background: none;">
                <img style="width:10%;"src="<?php echo base_url()?>img/schoolLogo/<?php echo $code?>.png" alt="User profile picture">
                <?php echo $name?>
                </buton>
              </span> 
          </div>
              <?php
                    }
                  }
              ?>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>

<script>
function readURL(input,id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#'+id).attr('src', e.target.result).width(50).height(50);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<div class="modal fade" id="uploadSchoolImage">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" style="text-align:center">Upload School's Logo</h4>
        </div>
        <div class="modal-body"> 
          <?php echo form_open_multipart('summaryReport/do_upload');?>
          <div class="form-group" style="text-align:center">
            <div data-provides="fileupload" class="fileupload fileupload-new" style="text-align:center">
              <div style="
                width: 67px; height: 50px;" class="fileupload-new img-thumbnail">
                  <img id="userfile_preview" class="media-object img-thumbnail pull-left" 
                  src="<?php if(!empty($profile_image)){  echo base_url(); ?>uploads/profile/<?php echo $profile_image; } 
                  else {  echo base_url(); ?>img/schoolLogo/no_img.png<?php } ?>" alt="" />
              </div>        
                <br><br>     
                       <label for="file-upload" class="custom-file-upload">
                          <i class="fa fa-cloud-upload"></i> Select file
                      </label>
                      <input id="file-upload" type="file" name="upload" id="upload" onchange="readURL(this,'userfile_preview');"/>
                      <input type="hidden" name="image_Name" id="image_Name" value="<?php echo $place?>"/>
              </div>
            </div>
          <input class="btn btn-primary btn-block" type="submit" value="Upload" name="submit"/>
          <?php echo form_close();?>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
<style>
input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>