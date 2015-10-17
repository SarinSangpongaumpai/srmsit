<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>css/update.css" rel="stylesheet" type="text/css" />
    
  </head>
 
  <body class="html">
    <div class="form-box" id="login-box">
      <div class="header">Change Password</div>
       <?php echo form_open('login/submitPassword'); ?>
        <div class="body bg-gray">
          <div class="form-group">
            <input type="text" readonly id="username" name="username" class="form-control" value="<?php echo $username?>"/>
          </div>
          <div class="form-group">
            <input type="password"  id="password" name="password"  class="form-control" placeholder="Password"/>
            <?php echo form_error('password'); ?>
          </div>
          <div class="form-group">
            <input type="password"  id="con_password" name="con_password" class="form-control" placeholder="Retype password"/>
            <?php echo form_error('con_password'); ?>
          </div>
        </div>
        <div class="footer">
          <button type="submit" id = "submit" value="Submit" class="btn bg-olive btn-block">Submit</button>
          <style>
            p {text-align:center ;color:red;}
          </style>
        </div>
      </form>
    </div><!-- /.form-box -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
      <script>
     $(document).ready(function() {
         $('#con_password').focusout(function(){
        var pass = $('#password').val();
        var pass2 = $('#con_password').val();
        if(pass != pass2){
            alert('the passwords didn\'t match!');
        }

     });
      $('#submit').bind("click",function() 
      { 

      if(!$('#password').val())
                  {
                      alert("Please input password");
                      return false;

                  }

       if(!$('#password').val())
                  {
                      alert("Please retype password");
                      return false;

                  }

          }); 
      });
    </script>
  </body>
</html>