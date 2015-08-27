<?php $school = "RO"; ?>
<?php $ac_id = "JPC11"; ?>
<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/update.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
 
  <body class="html">
    <div class="form-box" id="login-box">
      <div class="header">ลงทะเบียนข้อมูลนักเรียน</div>
       <?php echo form_open('activity/studentRegis'); ?>
        <div class="body bg-gray">
          <div class="form-group">
            <input type="number" name = "nationalID" id = "nationalID" class="form-control" placeholder="เลขประจำตัวประชาชน"/>
            <?php echo form_error('nationalID'); ?>
          </div>
          <div class="form-group">
            <input type="text"  id="FName"  name= "FName" class="form-control" placeholder="ชื่อ"/>
            <?php echo form_error('FName'); ?>
          </div>
          <div class="form-group">
            <input type="text" id="LName"  name="LName"   class="form-control" placeholder="นามสกุล"/>
            <?php echo form_error('LName'); ?>
          </div>
          <div class="form-group">
            <select id="school_year" name = "school_year"  class="form-control" value="ชั้นปี">
              <option value="มัธยมศึกษาปีที่1">มัธยมศึกษาปีที่1</option>
              <option value="มัธยมศึกษาปีที่2">มัธยมศึกษาปีที่2</option>
              <option value="มัธยมศึกษาปีที่3">มัธยมศึกษาปีที่3</option>
              <option value="มัธยมศึกษาปีที่4" selected>มัธยมศึกษาปีที่4</option>
              <option value="มัธยมศึกษาปีที่5">มัธยมศึกษาปีที่5</option>
              <option value="มัธยมศึกษาปีที่6">มัธยมศึกษาปีที่6</option>
            </select>
          </div>
           <div class="form-group">
            <select id="program" name = "program"  class="form-control" value="สายวิชา">
              <option value="วิทย์-คณิต"selected>วิทย์-คณิต</option>
              <option value="ศิลป์-คำนวน">ศิลป์-คำนวน</option>
              <option value="ศิลป์-ภาษา" >ศิลป์-ภาษา</option>
              <option value="ศิลป์-สังคม">ศิลป์-สังคม</option>
              <option value="อื่นๆ">อื่นๆ</option>
            </select>
          </div>
          <div class="form-group">
            <select id="gender" name="gender" class="form-control">
              <option value="ชาย">ชาย</option>
              <option value="หญิง">หญิง</option>
            </select>
          </div>
           <div class="form-group" style="">
            <input type="text"  id="school" name="school" readonly="false" class="form-control" 
             value = "<?php echo $school; ?>"
            />
          </div>
           <div class="form-group" style="">
            <input type="text"  id="ac_id" name="ac_id" readonly="false" class="form-control" 
             value = "<?php echo $ac_id; ?>"
            />
          </div>
           <div class="form-group">
                  <input type="number"  name="gpa" id = "gpa" class="form-control"  placeholder="GPA" ng-model="gpa" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required />
           </div>
        <div class="margin text-center">
          <button type="submit" id = "submit" value="Submit" class="btn bg-olive btn-block">Register</button>
          <style>
            p {text-align:center ;color:red;}
          </style>          
        </div>
      </form>
      <div class="margin text-center">
        <a href="<?php echo base_url();?>activity/login" class="text-center">กลับสู่หน้าเข้าร่วมกิจกรรม</a>
      </div>
    </div><!-- /.form-box -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
      <script>
     $(document).ready(function() 
          {
          $('#submit').bind("click",function() 
              { 
              if(!$('#nationalID').val())
                          {
                              alert("กรุณาใส่เลขประจำตัวประชาชน");
                              return false;
                          }
              if(!$('#FName').val())
                          {
                              alert("กรุณาใส่ชื่อ");
                              return false;
                          }
              if(!$('#LName').val())
                          {
                              alert("กรุณาใส่นามสกุล");
                              return false;
                          }
              var gpa = $("#gpa").val();           
              if(!gpa)
                          {
                              alert("กรุณาใส่เกรดเฉลี่ย");
                              return false;
                          }
              if(gpa > 4.00 || gpa < 0.01)
                          {
                              alert("กรุณาใส่เกรดเฉลี่ยให้ถูกต้อง");
                              return false;
                          }
          }); 
       });




    </script>
  </body>
</html>