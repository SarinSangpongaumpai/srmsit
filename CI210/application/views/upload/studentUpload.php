<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Event Report</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#test"><i class="fa fa-book"></i>Test</a></li>
      <li class="active">School</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
            <li class="pull-left header"><i class="fa fa-table"></i> Table</li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col"></div><!-- /.col -->
                <div class="center">
                  <div class="col-md-8 invoice-col">
                    <?php echo form_open_multipart("upload/studentUpload")?> 
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
             </div>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              kkk
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->
     </div><!-- /.row -->
  </section>
</div>

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

