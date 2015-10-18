<div class="well">
  <div class="errorresponse"></div>
    <form class="form" id="frmupdate" role="form" action="<?php echo base_url() ?>table/updateSchool" method="POST">
    <?php foreach($query->result() as $row):?>                 
      <div class="form-group">
        <label >รหัสโรงเรียน</label>
        <input readonly="false" type="text" name="school_code" class="form-control" value="<?php echo $row->school_code?>">
       </div>
      <div class="form-group">
        <label >ชื่อ</label>
          <input type="text" name="name" class="form-control" value="<?php echo $row->name?>" >
      </div>
      <div class="form-group">
        <label >สถานที่</label>
          <input type="text" name="location" class="form-control" value="<?php echo $row->location?>">
      </div>
      <div class="form-group">
        <label >บันทึก</label>
          <input type="text" name="note" class="form-control" value="<?php echo $row->note?>">
      </div>
      <div class="form-group">
        <label >ละติจูด</label>
          <input type="text" name="latitude" class="form-control" value="<?php echo $row->latitude?>">
      </div>
      <div class="form-group">
        <label >ลองติจูด</label>
          <input type="text" name="longitude" class="form-control" value="<?php echo $row->longitude?>">
      </div>
       <input type="submit" class="btn btn-success"  value="update">
      <?php endforeach;?>
      </form>
    </div>
</div>
<script>
$(document).ready(function (){
    $("#frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url() ?>table/updateSchool',
            type:'POST',
            dataType:'json',
            data: $("#frmupdate").serialize()
        }).done(function (data){
            window.mydata = data;
                if(mydata['error'] !=""){
                    $(".errorresponse").html(mydata['error']);
                }
                else{
                $(".errorresponse").text('');
                $('#frmupdate')[0].reset();
                $("#response").html(mydata['success']); 
                $.colorbox.close();
                $("#response").html(mydata['success']);
                }
        });
    });    
});   
</script>