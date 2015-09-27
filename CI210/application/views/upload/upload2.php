<link href="../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Confirm Upload
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Upload File</li>
          </ol>
        </section>

        <section class="content">
                 <div class="box box-primary">
                   <br>  



    <?php
      $objCSV = fopen("uploadFile/temp.csv", "r");
    ?>
      <div class="box-body" >
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>nationalID</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Grade</th>
                      </tr>
                    </thead>
                    <tbody>
    <?php
      while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
        $nameSTD = iconv("ISO-8859-11", "UTF-8", $objArr[1]) ;
    ?>
        <tr>

          <td><div align="center"><?php echo $objArr[0];?></div></td>
          <td><?php echo $nameSTD ?></td>
          <td><?php echo $objArr[2];?></td>
          <td><div align="center"><?php echo $objArr[3];?></div></td>
        </tr>
    <?php
      }
      fclose($objCSV);
    ?>
    </table>
<SCRIPT>
function submitForm(i) {
   if (i==1) document.theForm.action=
      'submit'
   if (i==2) document.theForm.action=
      'index'
   document.theForm.submit()
   }
</SCRIPT>
</script>

        <br>

<form name="theForm">
         <div class = "center">

          <input name="btnSubmit" onclick="submitForm('1')" id="btnSubmit" value="Submit" class="btn btn-primary">

          <input name="cancel" onclick="submitForm('2')"   id="btnCancel" value="Cancel" class="btn btn-primary">

        </div>
</form>
      </section>
     </div><!-- /.content-wrapper -->
     <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="js/app.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js" type="text/javascript"></script>
    <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
     <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    <style>
    .center {
        margin-left: 300px;
        margin-right: 300px;
        width: 75%;
    }
    .Fontcenter {
        margin-left: 250px;
        margin-right: 300px;
        width: 100%;
    }
    .fileUpload {
      position: relative;
      overflow: hidden;
      margin: 20px;
    }
    .fileUpload input.upload {
      position: absolute;
      top: 0;
      right: 0;
      margin: 0;
      padding: 0;
      font-size: 30px;
      cursor: pointer;
      opacity: 0;
      filter: alpha(opacity=0);
    }
    </style>