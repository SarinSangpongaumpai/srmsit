<a href="#uploadSchoolImage" data-toggle="modal" class="btn btn-primary btn-block"><b>ViewMap</b></a>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-body"> 
          <?php echo form_open_multipart('summaryReport/do_upload');?>
          <div class="form-group">
              <label>Select image</label>
               <div data-provides="fileupload" class="fileupload fileupload-new">
                <div style="width: 67px; height: 50px;" class="fileupload-new img-thumbnail">
                  <img id="userfile_preview" class="media-object img-thumbnail pull-left" 
                  src="<?php if(!empty($profile_image)){  echo base_url(); ?>uploads/profile/<?php echo $profile_image; } 
                  else {  echo base_url(); ?>img/schoolLogo/no_img.png<?php } ?>" alt="" />
                </div>                  
                <span class="btn btn-default btn-file">
                      <input name="upload" id="upload" type="file" onchange="readURL(this,'userfile_preview');" />
                      <input type="text" name="image_Name" id="image_Name" value="KMUTTdsa"/>
                </span>                 
                <span class="required-server"><?php echo form_error('upload'); ?> </span>
                </div>
            </div>
          <br />
          <br />
          <input type="submit" value="upload" name="submit"/>
          <?php echo form_close();?>
          </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->