<div class="well">
  <div class="errorresponse"></div>
    <form class="form" id="frmupdate" role="form" action="<?php echo base_url() ?>table/updateStudent" method="POST">
    <?php foreach($query->result() as $row):?>                 
      <div class="form-group">
        <label >เลขประจำตัวประชาชน</label>
        <input readonly="false" type="text" name="nationalID" class="form-control" value="<?php echo $row->nationalID?>">
       </div>
      <div class="form-group">
        <label >ชื่อจริง</label>
          <input type="text" name="FName" class="form-control" value="<?php echo $row->FName?>" >
      </div>
      <div class="form-group">
        <label >นามสกุล</label>
          <input type="text" name="LName" class="form-control" value="<?php echo $row->LName?>">
      </div>
      <div class="form-group">
        <label >ชั้นปี</label>
        <select id = "school_year" name = "school_year"  class="form-control" >
          <option selected value="<?php echo $row->school_year ?>"><?php echo $row->school_year."#" ?></option>
          <option value="มัธยมศึกษาปีที่1">มัธยมศึกษาปีที่1</option>
          <option value="มัธยมศึกษาปีที่2">มัธยมศึกษาปีที่2</option>
          <option value="มัธยมศึกษาปีที่3">มัธยมศึกษาปีที่3</option>
          <option value="มัธยมศึกษาปีที่4" >มัธยมศึกษาปีที่4</option>
          <option value="มัธยมศึกษาปีที่5">มัธยมศึกษาปีที่5</option>
          <option value="มัธยมศึกษาปีที่6">มัธยมศึกษาปีที่6</option>
        </select>
      </div>
      <div class="form-group">
        <label >สายวิชา</label>
        <select id="program" name = "program"  class="form-control" >
          <option selected value="<?php echo $row->program ?>"><?php echo $row->program."#" ?></option>
          <option value="วิทย์-คณิต">วิทย์-คณิต</option>
          <option value="ศิลป์-คำนวน">ศิลป์-คำนวน</option>
          <option value="ศิลป์-ภาษา" >ศิลป์-ภาษา</option>
          <option value="ศิลป์-สังคม">ศิลป์-สังคม</option>
          <option value="อื่นๆ">อื่นๆ</option>
        </select>
      </div>
      <div class="form-group">
        <label >เพศ</label>
        <select name="gender" class="form-control">
          <option selected value="<?php echo $row->gender ?>"><?php echo $row->gender."#" ?></option>
          <option value="ชาย">ชาย</option>
          <option value="หญิง">หญิง</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword2">GPA</label>
        <div class="form-group">
          <input type="number"  name="gpa" id = "gpa" class="form-control"  placeholder="GPA" ng-model="gpa" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required 
                    value="<?php echo $row->gpa ?>"/>
          <input type="submit" class="btn btn-success"  value="update">
        </div>
      <?php endforeach;?>
      </form>
    </div>
</div>
<script>
  $(document).ready(function() {
    $('#submit').bind("click",function() { 
      var gpa = $("#gpa").val();           
      if(!gpa){
        alert("กรุณาใส่เกรดเฉลี่ย");
        return false;
      }
      if(gpa > 4.00 || gpa < 0.01){
        alert("กรุณาใส่เกรดเฉลี่ยให้ถูกต้อง");
        return false;
      }
    }); 
  });
</script>
<script>
$(document).ready(function (){
    $("#frmupdate").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'<?php echo base_url() ?>table/updateStudent',
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