

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.min.css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/jquery.colorbox-min.js"></script>
        <style>#loader{display: none}</style>

<div class="content-wrapper">
    <section class="content-header">
<div class="row clear_fix">
    <div class="col-md-12">

        <div id="response"></div>
        <table id="example1"class="table">
            <thead><tr>
              <th>เลขประชาชน</th>
              <th>ชื่อ</th>
              <th>นามสกุล</th>
              <th>ชั้นปี</th>
              <th>สายวิชา</th>
              <th>เพศ</th>
              <th>gpa</th>
              <th>โรงเรียน</th>
              <th>Action</th></tr></thead>
            <tbody id="fillgrid">
            
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
</div>

<div class="well">
   <table id="example1"class="table">
            <thead><tr>
              <th>เลขประชาชน</th>
              <th>ชื่อ</th>
              <th>นามสกุล</th>
              <th>ชั้นปี</th>
              <th>สายวิชา</th>
              <th>เพศ</th>
              <th>gpa</th>
              <th>โรงเรียน</th></tr></thead>
            <tbody >
            <form class="form-inline" role="form" id="frmadd" action="<?php echo base_url() ?>table/create" method="POST">
                <td>
                    <input type="text" name="nationalID" class="form-control" placeholder="เลขประจำตัวประชาชน">
                </td>
                <td>
                    
                        <input class="form-control" name="FName"  placeholder="ชื่อ">
                    </td>
                <td>
                    <input type="text" class="form-control" name="LName" placeholder="นามสกุล">
                </td>
                <td>
                    <select id = "school_year" name = "school_year"  class="form-control" >
                            
                                <option value="มัธยมศึกษาปีที่1">มัธยมศึกษาปีที่1</option>
                                <option value="มัธยมศึกษาปีที่2">มัธยมศึกษาปีที่2</option>
                                <option value="มัธยมศึกษาปีที่3">มัธยมศึกษาปีที่3</option>
                                <option value="มัธยมศึกษาปีที่4" >มัธยมศึกษาปีที่4</option>
                                <option value="มัธยมศึกษาปีที่5">มัธยมศึกษาปีที่5</option>
                                <option value="มัธยมศึกษาปีที่6">มัธยมศึกษาปีที่6</option>
                              </select>
                </td>
                <td>
                    <select id="program" name = "program"  class="form-control" >
                                
                                 <option value="วิทย์-คณิต">วิทย์-คณิต</option>
                                 <option value="ศิลป์-คำนวน">ศิลป์-คำนวน</option>
                                 <option value="ศิลป์-ภาษา" >ศิลป์-ภาษา</option>
                                 <option value="ศิลป์-สังคม">ศิลป์-สังคม</option>
                                 <option value="อื่นๆ">อื่นๆ</option>
                              </select>
                </td>
                <td>
                    <select name="gender" class="form-control">
                                
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                              </select>
                </td>
                <td>
                   <input type="number"  name="gpa" id = "gpa" class="form-control"  placeholder="GPA" ng-model="gpa" ng-pattern="/^[0-9]+(\.[0-9]{1,2})?$/" step="0.01" required 
                    />
                </td>
                <td>
                    <input type="text" name="place" class="form-control" >
                </td>
                    <input type="submit" class="btn btn-success" value="submit">
                
            </form>
            </tbody>
            <tfoot></tfoot>
        </table>
        </div>
</div>
</div>
</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
<script src="<?php echo base_url() ?>plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>js/app.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>js/demo.js" type="text/javascript"></script>
 <link href="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  
    


<script>
$(document).ready(function (){
    //fill data
    var btnedit='';
    var btndelete = '';
        fillgrid();
        // add data
        $("#frmadd").submit(function (e){
            e.preventDefault();
            $("#loader").show();
            var url = $(this).attr('action');
            var data = $(this).serialize();
            $.ajax({
                url:url,
                type:'POST',
                data:data
            }).done(function (data){
                $("#response").html(data);
                $("#loader").hide();
                fillgrid();
            });
        });
    
    
    
    function fillgrid(){
        $("#loader").show();
        $.ajax({
            url:'<?php echo base_url() ?>table/fillgrid',
            type:'GET'
        }).done(function (data){
            $("#fillgrid").html(data);

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

            $("#loader").hide();
            btnedit = $("#fillgrid .btnedit");
            btndelete = $("#fillgrid .btndelete");
            var deleteurl = btndelete.attr('href');
            var editurl = btnedit.attr('href');
            //delete record
            btndelete.on('click', function (e){
                e.preventDefault();
                var deleteid = $(this).data('id');
                if(confirm("are you sure")){
                    $("#loader").show();
                    $.ajax({
                    url:deleteurl,
                    type:'POST' ,
                    data:'id='+deleteid
                    }).done(function (data){
                    $("#response").html(data);
                    $("#loader").hide();
                    fillgrid();
                    });
                }
            });
            
            //edit record
            btnedit.on('click', function (e){
                e.preventDefault();
                var editid = $(this).data('id');
                $.colorbox({
                href:"<?php echo base_url()?>table/edit/"+editid,
                top:50,
                width:500,
                onClosed:function() {fillgrid();}
                });
            });
            
        });
    }
    
});
</script>

</body>
</html>
