
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/jquery.colorbox-min.js"></script>

<style>#loader{display: none}</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1><i class="fa fa-user"></i> School Table</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url()?>main/index"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-table"></i>Table</a></li>
        <li class="active">Student</li>
      </ol>
  </section>
  <section class="content">
    <div class="row clear_fix">
      <div class="col-md-12">
       <!-- loader -->
        <img id="loader" src="<?php echo base_url()?>img/asset/712.GIF" style="position: absolute; left: 45%; padding: 5px; width: 50px; box-shadow: 0px 0px 3px #333"/>
        <div id="response"></div>
         <div class="box"><br>
        <table id="example1"class="table table-bordered table-striped dataTable">
            <thead><tr>
              <th>รหัสโรงเรียน</th>
              <th>ชื่อ</th>
              <th>สถานที่</th>
              <th>บันทึก</th>
              <th>ละติจูด</th>
              <th>ลองติจูด</th>
              <th>Action</th></tr></thead>
            <tbody id="fillgrid">            
            </tbody>
            <tfoot></tfoot>
        </table>
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
<link  href="<?php echo base_url() ?>plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  
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
            url:'<?php echo base_url() ?>table/fillSchoolTable',
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
                    data:'school_code='+deleteid
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
                href:"<?php echo base_url()?>table/editSchool/"+editid,
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
