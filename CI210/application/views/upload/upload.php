<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Upload File
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Upload File</li>
          </ol>
        </section>

        <section class="content">
          <ul class="nav nav-tabs">
                  <li class="active"><a href="#fa-icons" data-toggle="tab">Font Awesome</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">Glyphicons</a></li>
                </ul>
                 <div class="box box-primary">
                   <br>  
               <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
            </div><!-- /.col -->
            <div class="center">
            <div class="col-md-8 invoice-col">
                <?php echo form_open_multipart("upload/do_upload")?> 
                <div class="center">
                    <input  id="uploadFile" placeholder="Choose File" size="19" />
                      <div class="fileUpload btn btn-primary">
                        <span>Upload</span>
                          <input id="uploadBtn" name="upload"type="file" class="upload" accept=".csv" />
                      </div>
                    </div><br>
                      <div class = "center">
                          <button id = "submit"type ="submit" name="save" value="Upload" class="btn btn-primary" style="width: 200px">Submit</button>
                     </div>
                   </div>
              <?php echo form_close();?>
            </div><!-- /.col -->
          </div>
          
                    <!-- 
               <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                 <strong > Applicants </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input id="uploadFile" placeholder="Choose File" size="70"  accept=".xls,.xlsx" />
                      <div class="fileUpload btn btn-primary">
                        <span>Upload</span>
                          <input id="uploadBtn" type="file" class="upload" />
                    </div>
                    <strong > Format form </strong>

                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                 <strong > Students </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input id="uploadFile" placeholder="Choose File" size="70"  accept=".xls,.xlsx" />
                      <div class="fileUpload btn btn-primary">
                        <span>Upload</span>
                          <input id="uploadBtn" type="file" class="upload" />
                    </div>  
                      <strong > Format form </strong>
                    -->
    <br><br><br>
      <div class ="Fontcenter">
        <strong>Note : Excel file that uploaded must be the correctly format as below</strong>
      </div><br>

              <div class="box-body" >
                  <table id="example1" class="table table-bordered table-striped">
                    
                    <thead>
                      <tr>
                        <th>nationalId</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>School Year</th>
                        <th>Program</th>
                        <th>Gender</th>
                        <th>GPA</th>
                        <th>School</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1101500230012</td>
                        <td>เขมชาติ</td>
                        <td>จุฑาเพ็ชร์</td>
                        <td>มัธยมศึกษาปีที่4</td>
                        <td>วิทย์-คณิต</td>
                        <td>ชาย</td>
                        <td>4.00</td>
                        <td>โรงเรียนสวนกุหลาบรังสิต</td>
                      </tr>
                      <tr>
                        <td>1101500250012</td>
                        <td>วิภาวี</td>
                        <td>โมจนกุล</td>
                        <td>มัธยมศึกษาปีที่6</td>
                        <td>อื่นๆ</td>
                        <td>หญิง</td>
                        <td>2.53</td>
                        <td>โรงเรียนสตรีวิทยา</td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
      </section>
     </div><!-- /.content-wrapper -->
     <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
</div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../js/app.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../js/demo.js" type="text/javascript"></script>
    <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

    <script>
    //document.getElementById("uploadBtn").onchange = function () {
    //document.getElementById("uploadFile").value = this.value; 
    //};

    $(document).ready(function() {
      $('#submit').bind("click",function() 
      { 

      if(!$('#uploadBtn').val())
                  {
                      alert("Please input file");
                      return false;

                  }

          }); 
      });
     $("#uploadBtn").change(function() {
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'csv':
            document.getElementById("uploadFile").value = this.value;
                break;
            default:
                $(this).val('');
                alert("File must be .csv ");
                break;
        }
    });
    </script>
    <style>
    .center {
        margin-left: auto;
        margin-right: auto;
        width: 100%;
    }
    .Fontcenter {
        margin-left: 28%;
        width: 100%;
    }
    .fileUpload { 
      overflow: hidden;
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
    .col-md-8{
      padding-left: 60px;
    }
    </style>
  </body>
</html>

