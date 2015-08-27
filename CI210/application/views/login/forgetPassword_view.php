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
      <div class="header">Please enter email registered </div>
       <?php echo form_open('login/sendMail'); ?>
        <div class="body bg-gray">
          <div class="form-group">
            <input type="email"  id="email" name="email" class="form-control" placeholder="Email"/>
          </div>
        </div>
        <div class="footer">
          <button type="submit" id = "submit" value="Submit" class="btn bg-olive btn-block">Submit</button>
          <style>
            p {text-align:center ;color:red;}
          </style>
          <a href="<?php echo base_url();?>login" class="text-center">BacktoLoginPage</a>
        </div>
      </form>
    </div><!-- /.form-box -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
      <script>
      $('#submit').bind("click",function() 
      { 
      if(!$('#email').val())
                  {
                      alert("Please input email");
                      return false;
                  }
          }); 
      });
    </script>
  </body>
</html>