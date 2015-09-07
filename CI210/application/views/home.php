
<?php include 'header.php'; ?>
<?php include 'side.php'; ?>
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
            <thead><tr><th>Name</th><th>Email</th><th>Contact</th><th>facebook link</th><th>created</th><th>Action</th></tr></thead>
            <tbody id="fillgrid">
            
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
</div>
<div class="well">
            <form class="form-inline" role="form" id="frmadd" action="<?php echo base_url() ?>table/create" method="POST">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail2">Full name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail2" placeholder="name">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">@</div>
                        <input class="form-control" name="email" type="email" placeholder="Enter email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">Contact</label>
                    <input type="text" class="form-control" name="contact" id="exampleInputPassword2" placeholder="contact number">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword2">facebook link</label>
                    <input type="text" name="facebook" class="form-control" id="exampleInputPassword2" placeholder="http://facebook.com/pariharvikram1989">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" id="exampleInputPassword2" value="submit">
                </div>
            </form>
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
