
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
          <a href="login/forgetPassword">Forgot password?</a>
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

