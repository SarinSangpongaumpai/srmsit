      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Anonymus School Table</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">  
                        <li><a href="../../index23.html">School Report</a></li>
                        <li><a href="#">Separated Year</a></li>
                        <li><a href="#">Separated Round</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Change School</a></li>
                      </ul>
                    </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>CitizenID</th>
                        <th>Name</th>
                        <th>School</th>
                        <th>Gender</th>
                        <th>GPA</th>
                        <th>Year</th>
                        <th> LessonProgram</th>
                        <th>Participate</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1101500230012</td>
                        <td>James</td>
                        <td>BKK</td>
                        <td>M</td>
                        <td>4.00</td>
                        <td>M5</td>
                        <td>Math-Sci</td>
                        <td>None</td>
                      </tr>
                       <tr>
                        <td>1111100230012</td>
                        <td>Wiwat</td>
                        <td>BKK</td>
                        <td>M</td>
                        <td>3.03</td>
                        <td>M6</td>
                        <td>Math-Sci</td>
                        <td>RoadShow</td>
                      </tr>
                       <tr>
                        <td>12340051236</td>
                        <td>Ploy</td>
                        <td>SMR</td>
                        <td>F</td>
                        <td>2.01</td>
                        <td>M6</td>
                        <td>Math-Art</td>
                        <td>None</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>CitizenID</th>
                        <th>Name</th>
                        <th>School</th>
                        <th>Gender</th>
                        <th>GPA</th>
                        <th>Year</th>
                        <th> LessonProgram</th>
                        <th>Participate</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
       <link href="../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2015 <a href="https://www4.sit.kmutt.ac.th/">SIT's SRM</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

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
    <!-- page script -->
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
   
  </body>
</html>