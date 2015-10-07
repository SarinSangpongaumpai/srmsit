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
                        <th >เลขประจำตัวประชาชน</th>
                        <th >โรงเรียน</th>
                        <th >ช่องทางการสมัครเข้าศึกษา</th>
                        <th >ถาควิชาที่สมัคร</th>
                      </tr>
                    </thead>
                    <tbody>
    <?php
      while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
        $nationalId = iconv("ISO-8859-11", "UTF-8", $objArr[0]) ;
        $study_In = iconv("ISO-8859-11", "UTF-8", $objArr[1]) ;
        $type = iconv("ISO-8859-11", "UTF-8", $objArr[2]) ;
        $faculty = iconv("ISO-8859-11", "UTF-8", $objArr[3]) ;
    ?>
        <tr>

          <td><?php echo $nationalId ?></td>
          <td><?php echo $study_In ?></td>
          <td><?php echo $type ?></td>
          <td><?php echo $faculty ?></td>
        </tr>
    <?php
      }
      fclose($objCSV);
    ?>
    </table>
<SCRIPT>
function submitForm(i) {
   if (i==1) document.theForm.action=
      'registerSubmit'
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
     th,tr,td{ text-align:center;}
    </style>
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