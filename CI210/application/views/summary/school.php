<link href="<?php echo base_url();?>css/summaryReport.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
      if(isset($totalP)){
          foreach($totalP as $totalP){
             $totalP = $totalP->total;
           }
       }
       else{
          $totalP = $total;
       }
?>
<?php 
      if(isset($totalRegister)){
          foreach($totalRegister as $totalRegister){
             $totalRegister = $totalRegister->total;
           }
       }
       else{

       }
?>
<?php 
      if(isset($totalRegisterP)){
          foreach($totalRegisterP as $totalRegisterP){
             $totalRegisterP = $totalRegisterP->total;
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

      if(false !== ($Profile)){
          foreach($Profile as $profile){
             $name = $profile->name;
             $location = $profile->location;
             $latitude = $profile->latitude;
             $longitude = $profile->longitude;
             $note = $profile->note;
           }
       }
       else{

       }
?>
<?php 

      if(false !== ($CostEvent)){
          foreach($CostEvent as $CostEvent){
             $cost = $CostEvent->cost;
             $totalEvent = $CostEvent->totalEvent;
           }
       }
       else{
          $cost = "0";
          $totalEvent = "0";
       }
?>
<?php 
  if(isset($_GET['place'])){
         $place = $_GET['place'];
  }
  if(isset($_GET['Event'])){
         $event = $_GET['Event'];
  }
  else{
        $event = " ";
  }
?>
<?php 
  if(isset($_GET['start']) && isset($_GET['end'])){
         $start = $_GET['start'];
         $end   = $_GET['end'];
    }
    else{
          $start = "2015-01-01";
          $end   = date("Y-m-d");
    }
?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-book"></i> School Report <small>(<?php echo $start." - ".$end ?>)</small>
      <small><a style=" font-weight: bold;"
        href="#changeDate" data-toggle="modal" >Click change date</a></small></h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>summaryReport/index"><i class="fa fa-book"></i>SummaryReport</a></li>
      <li class="active">School</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->

        <div class="box box-primary">
            <div class="box-tools pull-right">
             <a href="#uploadSchoolImage" data-toggle="modal"
            style=" font-weight: bold;"class="btn btn-box-tool" ><i class="fa fa-upload"></i></a>
            </div>
          <div class="box-body box-profile" style="text-align:center">
            <img class="profile-user-img img-responsive "
            src="<?php echo base_url()?>img/schoolLogo/<?php echo $place?>.png" alt="User profile picture">
            <br><h5 style=" font-weight: bold;"class="profile-username text-center"><?php echo $name ?></h5>
            <a href="#changeSchool" data-toggle="modal"
            style=" font-weight: bold;"class="profile-username text-center" >change school</a><br>
            <br>
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item" >
                <b style="text-align:center">Events&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </b> <a class="pull-center"><?php echo $totalEvent ?>&nbsp;times</a>
              </li>
              <li class="list-group-item">
                <b>Participants&nbsp;&nbsp;</b><a class="pull-center"><?php echo $totalP ?> peoples</a>
              </li>
            </ul>
            <a href="#mapmodals" data-toggle="modal" class="btn btn-primary btn-block"><b>ViewMap</b></a>
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
              <?php if(false !== ($Contact)){
                  foreach($Contact as $contact){
                $contactEmail = $contact->Email;
                ?>
                <?= $contact->firstname;?>
                <?= $contact->lastname ?>
                (<?= $contact->profession ?>)<br>
                Phone: <?= $contact->phoneNum ?>
                <br>
                Email: <?= $contact->Email ?>
                <?php }
                }
                else{
                $contactEmail = "";
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
            <li><a href="<?php echo site_url(); ?>summaryReport?index?place=<?php echo $place ?>#succession" data-toggle="tab">Success</a></li>
            <li><a href="<?php echo site_url(); ?>summaryReport/index?place=<?php echo $place ?>#timeline" data-toggle="tab">Timeline</a></li>
            <li><a href="<?php echo site_url(); ?>summaryReport?index?place=<?php echo $place ?>#sendEmail" data-toggle="tab">Send Email</a></li>
            <li><a href="<?php echo site_url(); ?>summaryReport?index?place=<?php echo $place ?>#edit" data-toggle="tab">Edit</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
               <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <li class="active"><a href="<?php echo site_url(); ?>summaryReport/school?place=<?php echo $place ?>#pieChart" data-toggle="tab">PieChart</a></li>
                  <li><a href="<?php echo site_url(); ?>summaryReport/school?place=<?php echo $place ?>#columnChart" data-toggle="tab">ColumnChart</a></li>
                  <li class="pull-left header"><i class="fa fa-bar-chart"></i> Number of participants</li>
                </ul>
                <div class="tab-content no-padding">
                  <div class="chart tab-pane active" id="pieChart" style="position: relative; height: 300px;"></div>
                  <div class="chart tab-pane" id="columnChart" style="position: relative; height: 300px;"></div>
                </div>

              <div class="nav-tabs-custom">
              <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right"></ul>
              </div>
              <ul class="nav nav-tabs pull-right">
              <?php if(false !== ($Event)){  ?>
                
                <?php $number = 1;
                  foreach($Event as $event){
                ?>    

                  <?php if(isset($_GET['Event'])){ ?>
                    <?php if($number == 1){ ?>
                      <li><a href="<?php echo 
                    base_url() ?>summaryReport/school?place=<?php 
                    echo $place ?>&start=<?php echo $start ?>&end=<?php echo $end ?>" >Total Event</a></li>
                    <?php  $number = $number+1; }?>
                    <?php if (strcmp($_GET['Event'], $event->type) == 0) { ?>
                      <li class="active"><a  
                      href="<?php echo 
                    base_url() ?>summaryReport/changeEvent?place=<?php echo $place ?>&Event=<?php 
                    echo $event->type ?>&start=<?php echo $start ?>&end=<?php echo $end ?>" data-toggle="tab">
                      <?= $event->type ?></a></li>
                    <?php  }
                    else if (strcmp($_GET['Event'], $event->type) !== 0){ ?>
                    <li> <a  href="<?php echo 
                    base_url() ?>summaryReport/changeEvent?place=<?php echo $place ?>&Event=<?php 
                    echo $event->type ?>&start=<?php echo $start ?>&end=<?php echo $end ?>">
                    <?= $event->type ?></a></li>
                    <?php  }
                  }
                } ?>
                <?php if(!isset($_GET['Event'])){ ?>
                  <li class="active"><a href="<?php echo 
                    base_url() ?>summaryReport/school?place=<?php 
                    echo $place ?>&start=<?php echo $start ?>&end=<?php echo $end ?>" data-toggle="tab">Total Event</a></li>
                <?php 
                  foreach($Event as $event){
                ?>    
                    <li> <a  href="<?php echo 
                    base_url() ?>summaryReport/changeEvent?place=<?php echo $place ?>&Event=<?php 
                    echo $event->type ?>&start=<?php echo $start ?>&end=<?php echo $end ?>">
                    <?= $event->type ?></a></li>
                <?php  }
                }
              } ?>
                <li class="pull-left header"><i class="fa fa-table"></i> Table</li>

              </ul>


            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th >เพศ</th>
                    <th style="text-align:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน(คน)</th>
                    <th style="text-align:left;">%</th>
                  </tr>
                </thead>
                <?php if(false !==($Gender)){
                  foreach($Gender as $gender){
                ?>
                <tbody>
                  <tr>
                    <td><?= $gender->gender;?></td>
                    <td style="text-align:right;"><?= $gender->number;?></td>
                    <td class="progress-bar progress-bar-blue" style="width:<?= round($gender->number/ $total*100,0) ?>%;margin-top:5px"></td>
                    <td style="text-align:left;"><?= round($gender->number/ $total*100,0) ?></td>
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
                    <th style="text-align:right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน(คน)</th>
                    <th style="text-align:left;">%</th>
                  </tr>
                </thead>
                <?php if(false !==($Program)){
                  foreach($Program as $program){
                ?>
                <tbody>
                  <tr>
                    <td ><?= $program->program;?></td>
                    <td style="text-align:right"><?= $program->number;?></td>
                    <td class="progress-bar progress-bar-blue" style="width:<?= round($program->number/ $total*100,0) ?>%;margin-top:5px"></td>
                    <td style="text-align:left;"><?= round($program->number/ $total*100,0) ?></td>
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
                    <th style="text-align:left;">%</th>
                  </tr>
                </thead>
                <?php if(false !==($schoolYear)){
                  foreach($schoolYear as $schoolYear){
                ?>
                <tbody>
                  <tr>
                    <td ><?= $schoolYear->schoolYear;?></td>
                    <td style="text-align:right"><?= $schoolYear->number;?></td>
                    <td class="progress-bar progress-bar-blue" style="width:<?= round($schoolYear->number/ $total*100,0) ?>%;margin-top:5px"></td>
                    <td style="text-align:left;"><?= round($schoolYear->number/ $total*100,0) ?></td>
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
        
        <div class="tab-pane" id="succession" >
         <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                 <li class="pull-left header"><i class="fa fa-bar-chart"></i>Total registers</li>
                </ul>
                <div class="tab-content no-padding">
                  <div id="successionChart2" style="position: relative; height: 300px;"></div>
                </div>
                   <div class="table-responsive" >
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th >ภาควิชา</th>
                    <th style="text-align:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน(คน)</th>
                    <th style="text-align:left;">%</th>
                  </tr>
                </thead>
                <?php if(false !==($Faculty)){
                  foreach($Faculty as $faculty){
                ?>
                <tbody>
                  <tr>
                    <td><?= $faculty->faculty;?></td>
                    <td style="text-align:right;"><?= $faculty->number;?></td>
                    <td class="progress-bar progress-bar-blue" style="width:<?= round($faculty->number/ $totalRegister*100,0) ?>%;margin-top:5px"></td>
                    <td style="text-align:left;"><?= round($faculty->number/ $totalRegister*100,0) ?></td>
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
                <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-bar-chart"></i> Total register(only participants)</li>
                </ul>
                <div class="tab-content no-padding">
                  <div id="successionChart" style="position: relative; height: 300px;"></div>
                </div>
                   <div class="table-responsive" >
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th >ภาควิชา</th>
                    <th style="text-align:right;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวน(คน)</th>
                    <th style="text-align:left;">%</th>
                  </tr>
                </thead>
                <?php if(false !==($FacultyParticipant)){
                  foreach($FacultyParticipant as $faculty){
                ?>
                <tbody>
                  <tr>
                    <td><?= $faculty->faculty;?></td>
                    <td style="text-align:right;"><?= $faculty->number;?></td>
                    <td class="progress-bar progress-bar-blue" style="width:<?= round($faculty->number/ $totalRegisterP*100,0) ?>%;margin-top:5px"></td>
                    <td style="text-align:left;"><?= round($faculty->number/ $totalRegisterP*100,0) ?></td>
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

          </div>
       
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="timeline" >
           <div class="nav-tabs-custom">
              <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-ellipsis-v"></i>TimeLine</li>
              </ul>
          </div>
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">
            <!-- timeline time label -->
             <li class="time-label">
              <span class="bg-blue">
                Start Event
              </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <?php if(false !==($timeLine)){
              $count = 1;
                  foreach($timeLine as $timeLine){
                ?>
            <li>
              <i class="fa  bg-green"><?php echo $count ?></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $timeLine->start?></span>
                <h3 class="timeline-header"><a href="#"><?php echo $timeLine->title?></a></h3>
                <div class="timeline-body">
                  <?php echo $timeLine->detail?>
                </div>
              </div>
            </li>
            <?php 
              $count = $count+1;
             }
           }
             else{
             }
            ?>
            <li class="time-label">
              <span class="bg-red">
                <?php echo date("F j M  Y");  ?>
              </span>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
           
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <!--  END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div><!-- /.tab-pane -->

        <div class="tab-pane" id="sendEmail">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-envelope-o"></i>Mail</li>
                </ul>
              </div>
                <div class="box-body">
                  <form class="form-horizontal" method="post"  action="sendEmail?place=<?php echo $place?>" />
                  <div class="form-group">
                    <input class="form-control" name = "to" placeholder="To:" value="<?php echo $contactEmail ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" name = "subject" placeholder="Subject:">
                  </div>

                  <div class="form-group">
                    <textarea id="compose-textarea" name = "message" class="form-control" style="height: 300px">
                      
                    </textarea>
                    
                  </div>
                  <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
                </div><!-- /.box-body -->
              </form>
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                  <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                </div><!-- /.box-footer -->
        </div><!-- /.tab-pane -->



            <div class="tab-pane" id="edit">
              <div class="nav-tabs-custom">
              <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-database"></i>Edit Data</li>
              </ul>
            </div>
              <form class="form-horizontal" method="post"  action="editSchoolData?place=<?php echo $place?>" />
                <div class="form-group">
                  <label class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name"placeholder="Name"
                    value = "<?php echo $name;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Code</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="code" name = "code" placeholder="Code"
                    value = "<?php echo $place;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">location</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="location" name="location"placeholder="location"><?php echo $location;?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">note</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="note" name="note"placeholder="note"><?php echo $note;?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" id = "submit" value="Submit" class="btn btn-danger">Submit</button>
                  </div>
                </div>
              </div>
             </form>
            </div><!-- /.tab-pane -->

            
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->

  </section><!-- /.content -->

<?php include 'schoolChartConfig.php';?>
<?php include 'schoolMap.php';?>

   


      
