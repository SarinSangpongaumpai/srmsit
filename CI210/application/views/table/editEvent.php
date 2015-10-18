<div class="well">
  <div class="errorresponse"></div>
    <form class="form" id="frmupdate" role="form" action="<?php echo base_url() ?>table/updateStudent" method="POST">
    <?php foreach($query->result() as $row):?>                 
      <div class="form-group">
        <label >id</label>
        <input readonly="false" type="text" name="id" class="form-control" value="<?php echo $row->id?>">
       </div>
      <div class="form-group">
        <label >ชื่อกิจกรรม</label>
          <input type="text" name="title" class="form-control" value="<?php echo $row->title?>" >
      </div>
      <div class="form-group">
        <label >เริ่มต้น</label>
          <input type="text" name="start" class="form-control" value="<?php echo $row->start?>">
      </div>
      <div class="form-group">
        <label >สิ้นสุด</label>
          <input type="text" name="end" class="form-control" value="<?php echo $row->end?>">
      </div>
      <div class="form-group">
        <label >รูปแบบ</label>
          <input type="text" name="type" class="form-control" value="<?php echo $row->type?>">
      </div>
     <div class="form-group">
        <label >สถานที่</label>
          <input type="text" name="Place" class="form-control" value="<?php echo $row->Place?>">
      </div>
      <div class="form-group">
        <label >เงินลงทุน</label>
          <input type="text" name="budget" class="form-control" value="<?php echo $row->budget?>">
      </div>
      <div class="form-group">
        <label >เงินที่ใช้จริง</label>
          <input type="text" name="cost" class="form-control" value="<?php echo $row->cost?>">
      </div>
      <div class="form-group">
        <label >จำนวนผู้เจ้าร่วมที่คาดหวัง</label>
          <input type="text" name="expectPeople" class="form-control" value="<?php echo $row->expectPeople?>">
          <div class="form-group">
        <label >รายละเอียด</label>
          <input type="text" name="Detail" class="form-control" value="<?php echo $row->Detail?>">
      </div>
       <input type="submit" class="btn btn-success"  value="update">
      </div>
      <?php endforeach;?>
      </form>
    </div>
</div>
<script>
$(document).ready(function (){
    $("#frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url() ?>table/updateEvent',
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