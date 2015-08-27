
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
  </head>
 
  <body class="html">
    <div class="form-box" id="login-box">
      <div class="header"><?php echo $nationalID ?></div>
      <?php echo form_open("activity/activityRegis");?>
      <div class="body bg-gray" >
              <table style="margin:0 auto " class="table-condensed">
                <tr style="display:none">
                  <td>เลขประจำตัวประชาชน</td>
                  <td><input readonly="false"
                    type= "text" id="nationalID" name="nationalID" class="form-control"
                    value="<?php echo $nationalID ?>"/></td>
                </tr>
                <tr>
                  <td>ชื่อ</td>
                  <td>
                    <?php echo $FName ?></td>
                </tr>
                <tr>
                  <td>นามสกุล</td>
                  <td>
                    <?php echo $LName ?></td>
                </tr>
                <tr>
                  <td>ระดับการศึกษา</td>
                  <td>
                    <?php echo $school_year ?></td>
                </tr>
                <tr>
                  <td>แผนการเรียน</td>
                  <td><?php echo $program ?></td>
                </tr>
                <tr>
                  <td>เพศ</td>
                  <td>
                   <?php echo $gender ?></td>
                </tr>
                <tr>
                  <td>เกรดเฉลี่ย</td>
                  <td><?php echo $gpa ?></td>
                </tr>  
                <tr>
                  <td>โรงเรียน</td>
                  <td><?php echo $school_name ?></td>
                </tr>  
                <tr style="display:none">
                  <td>กิจกรรม</td>
                  <td>
                    <input readonly="false"
                    type= "text" id = "ac_id" name="ac_id" class="form-control"
                    value="<?php echo $ac_id ?>"/></td>
                </tr>   
              </table>
              <br>
              <button type="submit" id = "submit" value="Submit" class="btn bg-olive btn-block">ลงะเบียนกิจกรรม</button>
          <?php echo form_close();?>
      </form>
      <div class="margin text-center">
        <?php echo form_open("activity/studentUpdate");?>
        <input readonly="false" style="display:none"
                    type= "text" name="nationalID" class="form-control" 
                    value="<?php echo $nationalID ?>"/>
        <input readonly="false" style="display:none"
                    type= "text" name="school_code" class="form-control" 
                    value="<?php echo $school_code ?>"/>
        <button type="submit" id = "submit" value="Submit" class="btn bg-olive btn-block">แก้ไขข้อมูล</button>
        <?php echo form_close();?>
        <a href="<?php echo base_url();?>activity/login" class="text-center">ออกจากระบบ</a>
      </div>
    </div><!-- /.form-box -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
