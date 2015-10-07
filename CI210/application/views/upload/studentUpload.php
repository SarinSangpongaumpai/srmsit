<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-upload"></i> Upload File</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Upload File</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs pull-right">
            <li><a href="#register" data-toggle="tab">Register</a></li>
            <li><a href="#participant" data-toggle="tab">Participant</a></li>
            <li class="active"><a href="#student" data-toggle="tab">Student</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="student">
              <div class="row invoice-info">
                <div class="col-sm-3 invoice-col"></div><!-- /.col -->
                <div class="center">
                  <div class="col-md-8 invoice-col">
                    <?php echo form_open_multipart("upload/studentUpload")?> 
                    <div class="center">
                      <input  id="uploadFile" placeholder="Choose File" size="45" />
                        <div class="fileUpload btn btn-primary">
                          <span>Upload</span>
                          <input id="uploadBtn" name="upload"type="file" class="upload" accept=".csv" />
                        </div>
                    </div><br>
                
                    <div class = "center">
                        <button id = "submit"type ="submit" name="save" value="Upload" class="btn btn-primary" style="width: 200px;margin-left:75px">Submit</button>
                    </div>
                    <br>
              
                    <div class = "left">
                        <strong>Note : Excel file must be the correctly format as shown below</strong>
                    </div><br>
                  </div>
                  <?php echo form_close();?>
                </div><!-- /.col -->
              </div>
              <div class="box-body" >
              <table id="example1" class="table table-bordered table-striped" > 
                <thead>
                  <tr >
                    <th>เลขประจำตัวประชาชน</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>ชั่นปี</th>
                    <th>สายวิชา</th>
                    <th>เพศ</th>
                    <th>เกรดเฉลี่ย</th>
                    <th>โรงเรียน</th>
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
            <div class="tab-pane" id="participant">
              <div class="row invoice-info">
                <div class="col-sm-3 invoice-col"></div><!-- /.col -->
                <div class="center">
                  <div class="col-md-8 invoice-col">
                    <?php echo form_open_multipart("upload/participantUpload")?> 
                    <div class="center">
                      <input  id="uploadFileParticipant" placeholder="Choose File" size="45" />
                        <div class="fileUpload btn btn-primary">
                          <span>Upload</span>
                          <input id="uploadParticipant" name="upload"type="file" class="upload" accept=".csv" />
                        </div>
                    </div><br>
                
                    <div class = "center">
                        <button id = "submitParticipant"type ="submit" name="save" value="Upload" class="btn btn-primary" style="width: 200px;margin-left:75px">Submit</button>
                    </div>
                    <br>
              
                    <div class = "left">
                        <strong>Note : Excel file must be the correctly format as shown below</strong>
                    </div><br>

                  </div>
                  <?php echo form_close();?>
                </div><!-- /.col -->
              </div>
              <div class="box-body" >
              <div class="row" >
                <div class="col-md-3">  
                </div>
              <div class="col-md-5">   
              <table id="example1" class="table table-bordered table-striped"  > 
                <thead>
                  <tr>
                    <th   >เลขประจำตัวประชาชน</th>
                    <th   >กิจกรรมที่เข้าร่วม</th>
                  </tr>
                </thead>
                <tbody >
                  <tr>
                    <td >1101500230012</td>
                    <td >JPC11</td>
                  </tr>
                  <tr>
                    <td>1101500250012</td>
                    <td>WIP7</td>
                  </tr>
                </tbody>
              </table>  
            </div>
            </div>
             </div>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="register">
              <div class="row invoice-info">
                <div class="col-sm-3 invoice-col"></div><!-- /.col -->
                <div class="center">
                  <div class="col-md-8 invoice-col">
                    <?php echo form_open_multipart("upload/registerUpload")?> 
                    <div class="center">
                      <input  id="uploadFileRegister" placeholder="Choose File" size="45" />
                        <div class="fileUpload btn btn-primary">
                          <span>Upload</span>
                          <input id="uploadRegister" name="upload"type="file" class="upload" accept=".csv" />
                        </div>
                    </div><br>
                
                    <div class = "center">
                        <button id = "submitRegister"type ="submit" name="save" value="Upload" class="btn btn-primary" style="width: 200px;margin-left:75px">Submit</button>
                    </div>
                    <br>
              
                    <div class = "left">
                        <strong>Note : Excel file must be the correctly format as shown below</strong>
                    </div><br>
                  </div>
                  <?php echo form_close();?>
                </div><!-- /.col -->
              </div>
              
              
              <div class="box-body" >
              <div class="row" >
                <div class="col-md-2">  
                </div>
              <div class="col-md-7">   
              <table id="example1" class="table table-bordered table-striped"  > 
                <thead>
                  <tr>
                    <th>เลขประจำตัวประชาชน</th>
                    <th>โรงเรียน</th>
                    <th>ช่องทางการสมัครเข้าศึกษา</th>
                    <th>ถาควิชาที่สมัคร</th>
                  </tr>
                </thead>
                <tbody >
                  <tr>
                    <td >1101500230012</td>
                    <td >โรงเรียนวัดราชโอรส</td>
                    <td >ActiveRecruitment</td>
                    <td>CS</td>
                  </tr>
                  <tr>
                    <td>1101500250012</td>
                    <td >โรงเรียนสตรีวิทย์</td>
                    <td >Gat-Pat</td>
                    <td>IT</td>
                  </tr>
                </tbody>
              </table>  
            </div>
            </div>
             </div>
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->
     </div><!-- /.row -->
  </section>
</div>
<style>
 th,tr,td{ text-align:center;}
</style>
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

     $(document).ready(function() {
      $('#submitParticipant').bind("click",function() 
      { 

      if(!$('#uploadParticipant').val())
                  {
                      alert("Please input file");
                      return false;

                  }

          }); 
      });
     $("#uploadParticipant").change(function() {
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'csv':
            document.getElementById("uploadFileParticipant").value = this.value;
                break;
            default:
                $(this).val('');
                alert("File must be .csv ");
                break;
        }
    });
     $(document).ready(function() {
      $('#submitRegister').bind("click",function() 
      { 

      if(!$('#uploadRegister').val())
                  {
                      alert("Please input file");
                      return false;

                  }

          }); 
      });
     $("#uploadRegister").change(function() {
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'csv':
            document.getElementById("uploadFileRegister").value = this.value;
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
    .left {
        margin-left: -5%;
        margin-right: auto;
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

