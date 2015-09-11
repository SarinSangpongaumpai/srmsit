<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Responsive login with social buttons - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
        body {
          background: #2d2d2d;
          background: 
          url("img/bg.jpg") no-repeat center fixed   
      }   
        p {text-align:center ;color:red;} 
    </style>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</head>
<body >
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <div class="container"  style="text-align:center">  
    <br><br>
    
    <div class="omb_login">
       <div class="row omb_row-sm-offset-3">
          <div class="col-xs-15 col-sm-6" >
            <img  style="width:45%;"src="img/logo.png" >
          </div>
    </div><br>


    <div class="row omb_row-sm-offset-3" >
      <div class="col-xs-12 col-sm-5" >  
        <?php echo form_open('login/verifylogin'); ?>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control"  id = "username"name="username"  
            placeholder="User ID">
          </div>
          <span class="help-block"></span>    
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input  type="password" class="form-control"id = "password" name="password" 
             placeholder="Password">
          </div><br>
          <?php echo form_error('username'); ?>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <?php echo form_close();?>
      </div>
    </div>
    <div class="row omb_row-sm-offset-3" >
        <p class="omb_forgotPwd" style="text-align:center;  text-decoration: underline;">
          <a data-toggle="modal" data-target="#myModal">Forget password?</a>
        </p>   
   </div>
  </div>
</body>
</html>
<script src="js/bootstrap/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script>
     $(document).ready(function() {
      $('#submit').bind("click",function() 
      { 

      if(!$('#username').val())
                  {
                      alert("Please input ID");
                      return false;

                  }

      if(!$('#password').val())
                  {
                      alert("Please input password");
                      return false;

                  }

          }); 
      });
    </script>

 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forget password</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('login/sendMail'); ?>
        <div class="body bg-gray">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email"  id="forgetEmail" name="forgetEmail" class="form-control" placeholder="Email"/>
            </div>
          </div>
        </div>
        <div class="footer">
          <button type="submit" id = "submit2" value="Submit" class="btn btn-lg btn-primary btn-block">Send Email</button>
          <style>
            p {text-align:center ;color:red;}
          </style>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<script>
      $('#submit2').bind("click",function() 
      { 
      if(!$('#forgetEmail').val())
                  {
                      alert("Please input email");
                      return false;
                  }
      });
    </script>