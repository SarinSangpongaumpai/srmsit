<?php $school_code = "RO"; ?>
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
      <div class="header">เข้าร่วมกิจกรรม SIT</div>
       <?php echo form_open('activity/studentLogin'); ?>
        <div class="body bg-gray">
          <div class="form-group">
            <input type="number" name = "nationalID" id = "nationalID" class="form-control" placeholder="เลขประจำตัวประชาชน"/>
            <?php echo form_error('nationalID'); ?>
          </div>
         <div class="form-group" style="">
            <input type="text"  id="school_code" name="school_code" readonly="false" class="form-control" 
             value = "<?php echo $school_code; ?>"
            />
          </div>
           <div class="form-group" style="">
            <input type="text"  id="ac_id" name="ac_id" readonly="false" class="form-control" 
             value = "<?php echo $ac_id; ?>"
            />
          </div>
        <div class="margin text-center">
          <button type="submit" id = "submit" value="Submit" class="btn bg-olive btn-block">Login</button>
          <style>
            p {text-align:center ;color:red;}
          </style>          
        </div>
      </form>
      <div class="margin text-center">
        <a href="<?php echo base_url();?>activity/regis" class="text-center">ลงทะเบียนข้อมูลนักเรียน</a>
      </div>
    </div><!-- /.form-box -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
      <script>
     $(document).ready(function() {
       
      $('#submit').bind("click",function() 
      { 

      if(!$('#nationalID').val())
                  {
                      alert("กรุณาใส่เลขประจำตัวประชาชน");
                      return false;

                  }
          }); 
      });




    </script>
  </body>
</html>