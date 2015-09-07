<?php 
      if(isset($total)){
          foreach($total as $total){
             $total = $total->total;
           }
       }
       else{

       }
?>
<?php 
      if(isset($distinctEvent)){
          foreach($distinctEvent as $distinctEvent){
             $distinctEvent = $distinctEvent->distinctEvent;
           }
       }
       else{

       }
?>
<?php 
      if(isset($Profile)){
          foreach($Profile as $profile){
             $name = $profile->name;
             $cost = $profile->cost;
             $location = $profile->location;
             $latitude = $profile->latitude;
             $longitude = $profile->longitude;
             $totalEvent = $profile->totalEvent;
             $note = $profile->note;
           }
       }
       else{

       }
?>
<?php 
      if(isset($Profile)){
          foreach($Profile as $profile){
             $name = $profile->name;
             $cost = $profile->cost;
             $location = $profile->location;
             $latitude = $profile->latitude;
             $longitude = $profile->longitude;
             $totalEvent = $profile->totalEvent;
             $note = $profile->note;
           }
       }
       else{

       }
?>
<?php 
  if(isset($_GET['Place'])){
         $place = $_GET['Place'];
  }
  if(isset($_GET['Event'])){
         $event = $_GET['Event'];
  }
?>
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">User profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive "
                  src="../img/schoolLogo/ACBK.png" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $name ?></h3>
                  <br>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Events</b> <a class="pull-right"><?php echo $totalEvent ?> times</a>
                    </li>
                    <li class="list-group-item">
                      <b>Participants</b> <a class="pull-right"><?php echo $total ?> peoples</a>
                    </li>
                  </ul>
                  <a data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About School</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Contact person</strong>
                  <p class="text-muted">
                    <?php if(!is_null($Contact)){
                        foreach($Contact as $contact){
                      ?>
                      <?= $contact->firstname;?>
                      <?= $contact->lastname ?>
                      (<?= $contact->profession ?>)<br>
                      เบอร์ติดต่อ <?= $contact->phoneNum ?>
                      <br>
                      <?php }
                      }
                      else{
                      ?>
                        -
                      <?php
                      }
                      ?>   <!-- for each-->
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted"><?php echo $location ?></p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                  <p class="text-muted"><?php echo $note ?></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
             <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="<?php echo site_url(); ?>summaryReport/index#activity" data-toggle="tab">Activity</a></li>
                  <li><a href="<?php echo site_url(); ?>summaryReport/index?Place=<?php echo $place ?>#timeline" data-toggle="tab">Timeline</a></li>
                  <li><a href="<?php echo site_url(); ?>summaryReport?index?Place=<?php echo $place ?>#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                     <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="<?php echo site_url(); ?>summaryReport/index?Place=<?php echo $place ?>#pieChart" data-toggle="tab">PieChart</a></li>
                  <li><a href="<?php echo site_url(); ?>summaryReport/index?Place=<?php echo $place ?>#columnChart" data-toggle="tab">ColumnChart</a></li>
                  <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
                <div class="tab-content no-padding">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="pieChart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="columnChart" style="position: relative; height: 300px;"></div>
                </div>

                    <!-- Tabs within a box -->
                    <div class="nav-tabs-custom">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right">
                    </ul>
                    </div>
                    <ul class="nav nav-tabs pull-right">
                    <?php if(isset($Event)){  ?>
                      
                      <?php $number = 1;
                        foreach($Event as $event){
                      ?>    

                        <?php if(isset($_GET['Event'])){ ?>
                          <?php if($number == 1){ ?>
                            <li><a href="<?php echo 
                          base_url() ?>summaryReport/index?Place=<?php echo $place ?>" data-toggle="tab">Total Event</a></li>
                          <?php  $number = $number+1; }?>
                          <?php if (strcmp($_GET['Event'], $event->type) == 0) { ?>
                            <li class="active"><a  
                            href="<?php echo 
                          base_url() ?>summaryReport/changeEvent?Place=<?php echo $place ?>&Event=<?php echo $event->type ?>" data-toggle="tab">
                            <?= $event->type ?></a></li>
                          <?php  }
                          else if (strcmp($_GET['Event'], $event->type) !== 0){ ?>
                          <li> <a  href="<?php echo 
                          base_url() ?>summaryReport/changeEvent?Place=<?php echo $place ?>&Event=<?php echo $event->type ?>">
                          <?= $event->type ?></a></li>
                          <?php  }
                        }
                      } ?>
                      <?php if(!isset($_GET['Event'])){ ?>
                        <li class="active"><a href="<?php echo 
                          base_url() ?>summaryReport/index?Place=<?php echo $place ?>" data-toggle="tab">Total Event</a></li>
                      <?php 
                        foreach($Event as $event){
                      ?>    
                          <li> <a  href="<?php echo 
                          base_url() ?>summaryReport/changeEvent?Place=<?php echo $place ?>&Event=<?php echo $event->type ?>">
                          <?= $event->type ?></a></li>
                      <?php  }
                      }
                    } ?>
                      <li class="pull-left header"><i class="fa fa-inbox"></i> Table</li>

                    </ul>


                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th >เพศ</th>
                          <th style="text-align:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;จำนวน(คน)</th>
                          <th style="text-align:center;">%</th>
                        </tr>
                      </thead>
                      <?php if(isset($Gender)){
                        foreach($Gender as $gender){
                      ?>
                      <tbody>
                        <tr>
                          <td><?= $gender->gender;?></td>
                          <td style="text-align:right;"><?= $gender->number;?></td>
                          <td style="text-align:center;"><?= $gender->number/ $total*100 ?></td>
                        </tr>  
                      </tbody>
                      <?php }
                      }
                      else{
                      ?>
                        <tr>
                        <td>- </td>
                        </tr>
                      <?php
                      }
                      ?>   <!-- for each-->
                    </table>
                  </div><!-- /.table-responsive -->
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th >สายวิชา</th>
                          <th style="text-align:right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน(คน)</th>
                          <th style="text-align:center;">%</th>
                        </tr>
                      </thead>
                      <?php if(isset($Program)){
                        foreach($Program as $program){
                      ?>
                      <tbody>
                        <tr>
                          <td ><?= $program->program;?></td>
                          <td style="text-align:right"><?= $program->number;?></td>
                          <td style="text-align:center;"><?= $program->number/ $total*100 ?></td>
                        </tr>  
                      </tbody>
                      <?php }
                      }
                      else{
                      ?>
                        <tr>
                        <td>- </td>
                        </tr>
                      <?php
                      }
                      ?>   <!-- for each-->
                    </table>
                  </div><!-- /.table-responsive -->
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th >ชั้นปี</th>
                          <th style="text-align:right">จำนวน(คน)</th>
                          <th style="text-align:center;">%</th>
                        </tr>
                      </thead>
                      <?php if(isset($schoolYear)){
                        foreach($schoolYear as $schoolYear){
                      ?>
                      <tbody>
                        <tr>
                          <td ><?= $schoolYear->schoolYear;?></td>
                          <td style="text-align:right"><?= $schoolYear->number;?></td>
                          <td style="text-align:center;"><?= $schoolYear->number/ $total*100 ?></td>
                        </tr>  
                      </tbody>
                      <?php }
                      }
                      else{
                      ?>
                        <tr>
                        <td>- </td>
                        </tr>
                      <?php
                      }
                      ?>   <!-- for each-->
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                  </div><!-- /.tab-pane -->
              

                  <div class="tab-pane" id="timeline" >

                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">SRM</a> sent you an email</h3>
                          <div class="timeline-body">
                            เรียนอาจารย์ ...
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-comments bg-yellow"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                          <h3 class="timeline-header">Open House</h3>
                          <div class="timeline-body">
                            งานดำเนินไปด้วยความราบรื่น
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <!-- END timeline item -->
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>      
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/exporting/amexport_combined.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
<script>;
  var chart;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReport/pieChart?Place=<?php 
                echo $place ?>",  function (data) {
        chart.dataProvider = data; 
        chart.validateData();
      });
    });
        var chart = AmCharts.makeChart("pieChart", {
          "type": "pie",
          "startDuration": 0,
           "theme": "light",
          "addClassNames": true,
          "legend":{
            "title":"(Student)",
            "position":"bottom",
            "autoMargins":true
          },
          "innerRadius": "30%",
          "defs": {
            "filter": [{
              "id": "shadow",
              "feOffset": {
                "result": "offOut",
                "in": "SourceAlpha",
                "dx": 0,
                "dy": 0
              },
              "feGaussianBlur": {
                "result": "blurOut",
                "in": "offOut",
                "stdDeviation": 5
              },
              "feBlend": {
                "in": "SourceGraphic",
                "in2": "blurOut",
                "mode": "normal"
              }
            }]
          },
          //"dataProvider": [{"type":"Camp","student":"0"},{"type":"OpenHouse","student":"1"},{"type":"WIP","student":"0"}],
          "valueField": "student",
          "titleField": "type",
          "export": {
            "enabled": true
          }
        });

        chart.addListener("init", handleInit);

        chart.addListener("rollOverSlice", function(e) {
          handleRollOver(e);
        });

        function handleInit(){
          chart.legend.addListener("rollOverItem", handleRollOver);
        }

        function handleRollOver(e){
          var wedge = e.dataItem.wedge.node;
          wedge.parentNode.appendChild(wedge);  
        }

  </script>

  <script>;
  var columnChart;
             
             $(document).ready(function(){
               $.getJSON("<?php echo base_url() ?>summaryReport/columnChart?Place=<?php 
                echo $place ?>",  function (data) {
                    columnChart.dataProvider = data;   
                    var numberEvent = "<?php echo $distinctEvent; ?>"
                    colorSet(numberEvent);
                    columnChart.validateData();
                });

             });


        
            var columnChart = AmCharts.makeChart("columnChart", {
                theme: "none",
                startDuration: 1,
                type: "serial",
                //dataProvider: chartData,
                categoryField: "type",
                depth3D: 30,
                angle: 30,

                categoryAxis: {
                    labelRotation: 90,
                    gridPosition: "start"
                },

                valueAxes: [{
                    position: "left",
                    title: "Students"
                }],

                graphs: [{
                    balloonText: "[[category]]: <b>[[value]]</b>",
                    valueField: "student",
                    colorField: "color",
                    type: "column",
                    lineAlpha: 0.1,
                    fillAlphas: 1
                }],

                chartCursor: {
                    cursorAlpha: 0,
                    zoomable: false,
                    categoryBalloonEnabled: false
                },
                pathToImages:"http://www.amcharts.com/lib/3/images/",
                amExport:{
                  top:21,
                  right:20,
                  exportJPG:true,
                  exportPNG:true,
                  exportSVG:true
                }

            });
            jQuery('.chart-input').off().on('input change',function() {
                var property    = jQuery(this).data('property');
                var target      = chart;
                columnChart.startDuration = 0;

                if ( property == 'topRadius') {
                    target = columnChart.graphs[0];
                    if ( this.value == 0 ) {
                      this.value = undefined;
                    }
                }

                target[property] = this.value;
                columnChart.validateNow();
            });

            function colorSet(row){
              if(row.localeCompare("0"))  columnChart.dataProvider[0].color = "#FF0F00";   
              if(row.localeCompare("1"))  columnChart.dataProvider[1].color = "#FF9E01";
              if(row.localeCompare("2"))  columnChart.dataProvider[2].color = "#F8FF01";
              if(row.localeCompare("3"))  columnChart.dataProvider[3].color = "#04D215";
              if(row.localeCompare("4"))  columnChart.dataProvider[4].color = "#0D8ECF";
              if(row.localeCompare("5"))  columnChart.dataProvider[5].color = "#2A0CD0";
              if(row.localeCompare("6"))  columnChart.dataProvider[6].color = "#CD0D74";
              if(row.localeCompare("7"))  columnChart.dataProvider[7].color = "#DDDDDD";
              if(row.localeCompare("8"))  columnChart.dataProvider[8].color = "#333333";
            }   
  </script>
                                                  
<style type="text/css">

.amcharts-pie-slice {
  transform: scale(1);
  transform-origin: 50% 50%;
  transition-duration: 0.3s;
  transition: all .3s ease-out;
  -webkit-transition: all .3s ease-out;
  -moz-transition: all .3s ease-out;
  -o-transition: all .3s ease-out;
  cursor: pointer;
  box-shadow: 0 0 30px 0 #000;
}

.amcharts-pie-slice:hover {
  transform: scale(1.1);
  filter: url(#shadow);
}  
.amcharts-legend-div {
  overflow-y: auto!important;
  max-height: 300px;
}           
</style>


<script>
function initMap() {
  var myLatLng = {lat: <?php echo $latitude?>, lng: <?php echo $longitude?>};

  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    zoom: 10
  });

  // Create a marker and set its position.
  var marker = new google.maps.Marker({
    map: map,
    position: myLatLng,
  });
}
</script>
<style>
      #modal-body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initMap" async defer></script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Event</h4>
      </div>
      <div class="modal-body">
        <div id="map" style="height: 380px; width: 580px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



















      
