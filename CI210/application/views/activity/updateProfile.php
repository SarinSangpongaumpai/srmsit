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

  </head>
 
  <body class="html">
    <div class="form-box" id="login-box">
      <div class="header"><?php echo $nationalID ?></div>
      <?php echo form_open("activity/updateProfile");?>
      <div class="body bg-gray" >
              <table style="margin:0 auto " class="table-condensed">
                <tr style="">
                  <td>เลขประจำตัวประชาชน</td>
                  <td><input readonly="false"
                    type= "text" name="nationalID" class="form-control"
                    value="<?php echo $nationalID ?>"/></td>
                </tr>
                <tr>
                  <td>ชื่อ</td>
                  <td><input type= "text" name="FName" class="form-control"
                    value="<?php echo $FName ?>"/></td>
                </tr>
                <tr>
                  <td>นามสกุล</td>
                  <td><input type= "text" name="LName" class="form-control"
                    value="<?php echo $LName ?>"/></td>
                </tr>
                <tr>
                  <td>ระดับการศึกษา</td>
                  <td><select id="school_year" name = "school_year"  class="form-control" >
                        <option selected value="<?php echo $school_year ?>">
                          <?php echo $school_year."#" ?>
                          </option>
                        <option value="มัธยมศึกษาปีที่1">มัธยมศึกษาปีที่1</option>
                        <option value="มัธยมศึกษาปีที่2">มัธยมศึกษาปีที่2</option>
                        <option value="มัธยมศึกษาปีที่3">มัธยมศึกษาปีที่3</option>
                        <option value="มัธยมศึกษาปีที่4" >มัธยมศึกษาปีที่4</option>
                        <option value="มัธยมศึกษาปีที่5">มัธยมศึกษาปีที่5</option>
                        <option value="มัธยมศึกษาปีที่6">มัธยมศึกษาปีที่6</option>
                      </select>
                </tr>
                <tr>
                  <td>แผนการเรียน</td>
                  <td><select id="program" name = "program"  class="form-control" >
                        <option selected value="<?php echo $program ?>">
                          <?php echo $program."#" ?>
                          </option>
                         <option value="วิทย์-คณิต">วิทย์-คณิต</option>
                         <option value="ศิลป์-คำนวน">ศิลป์-คำนวน</option>
                         <option value="ศิลป์-ภาษา" >ศิลป์-ภาษา</option>
                         <option value="ศิลป์-สังคม">ศิลป์-สังคม</option>
                         <option value="อื่นๆ">อื่นๆ</option>
                      </select>
                </tr>
                <tr>
                  <td>เพศ</td>
                  <td>
                   <select id="gender" name="gender" class="form-control">
                    <option selected value="<?php echo $gender ?>">
                          <?php echo $gender."#" ?>
                          </option>
                    <option value="ชาย">ชาย</option>
                    <option value="หญิง">หญิง</option>
                  </select>
                </tr>
                <tr>
                  <td>เกรดเฉลี่ย</td>
                  <td><input type="number"  name="gpa" id = "gpa" class="form-control"  placeholder="GPA" ng-model="gpa" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required 
                    value="<?php echo $gpa ?>"/></td>
                </tr>  
                   <tr>
                  <td>โรงเรียน</td>
                  <td><input type="text"  id="study_In" name="study_In" readonly="false" class="form-control" 
                     value = "<?php echo $school_name; ?>"
                    />   
                  </tr>
              </table>
              <br>
              <button type="submit" id = "submit" value="Submit" class="btn bg-olive btn-block">Update</button>
          <?php echo form_close();?>
      </form>
      <div class="margin text-center">
        <a href="<?php echo base_url();?>activity/login" class="text-center">ออกจากระบบ</a>
      </div>
    </div><!-- /.form-box -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
   <script>
     $(document).ready(function() 
          {
          $('#submit').bind("click",function() 
              { 
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