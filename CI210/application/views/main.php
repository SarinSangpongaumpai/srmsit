<div class="content-wrapper">
  <section class="content-header">
    <h1>Main</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-7">   
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Event Details</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->     
          <div class="box-body" >

            <?php
                  foreach($Current as $current)
                  {
                          $currentDate           = $current->start;
                          $currentSchool         = $current->place;
                          $currentDuration       = $current->duration;
                          $currentCost           = $current->cost;
                          $currentSchoolName     = $current->name;
                  }
            ?>
            <a href="previous?date=<?php echo $currentDate?>"
              style="position:relative;display: inline-block;width:30% " >
              <img  style="width:30%;"src="../img/button/leftArrow.png" >
            </a>
            <div style="position:relative;display: inline-block;width:36% ">
              <img  style="width:100%;"src='../img/schoolLogo/<?php echo trim($currentSchool) ?>.png' >
            </div>
            <a href="next?date=<?php echo $currentDate?>"
              style="position:relative;display: inline-block;width:30% ;left:25%" >
              <img  style="width:30%;"src="../img/button/rightArrow.png" >
            </a>
            <ul class="products-list product-list-in-box">        
              <div style="text-align:center;">
                <a href="javascript::;" class="product-title"><?php echo $currentSchoolName ?>
                  </ul>
              </div><!-- /.box-body -->
              <div class="box-footer text-center">
                <div class="uppercase">View More Details</div>
              </div><!-- /.box-footer -->
          </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-5">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Incoming Events</h3>
              <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead >
                  <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th>Duration</th>
                    <th>Remainning Day</th>
                    <th>Place</th>
                  </tr>
                </thead>
                    <?php $ID = 1; ?>
                    <?php if(isset($Event)){
                      foreach($Event as $event){
                    ?>
                <tbody>
                  <tr    style="text-align:center">
                    <td  style="text-align:left"><?php echo $ID ?></td>
                    <td  style="text-align:left"><?= $event->title;?></td>
                    <td><?= $event->duration;?> day</span></td>
                    <td><?= $event->timeLeft;?> day</td>
                    <td><?= $event->place;?></span></td>
                  </tr>
                <?php $ID= $ID+1; ?>  
                </tbody>
                    <?php }
                      }
                      else{
                    ?>
                    <tr    style="text-align:center">
                      <td  style="text-align:left">- </td>
                      <td  style="text-align:left">- </td>
                      <td> - </span></td>
                      <td> - </td>
                      <td> - </span></td>
                    </tr>
                    <?php
                      }
                    ?>   <!-- for each-->

              </table>
            </div><!-- /.table-responsive -- <button type="button"data-toggle="modal" data-target="#myModal">>
          </div><!-- /.box-body -->
          <div class="box-footer text-center">
            <a data-toggle="modal" data-target="#myModal" class="uppercase">View more events</a>
          </div><!-- /.box-footer -->
        </div><!-- /.box -->
      </div><!-- /.col -->  
    </div><!-- /.row -->
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-bitcoin "></i></span>
            <div class="info-box-content">
              <span class="info-box-text">COST</span>
              <span class="info-box-number"><?php echo $currentCost ?> bahts<small></small></span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Date</span>
              <span class="info-box-number"><?php echo $currentDate ?></span>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
      <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-tachometer"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Duration</span>
              <span class="info-box-number"><?php echo $currentDuration ?> day/s</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Responsible Person</span>
              <span class="info-box-number">SIT'SRM</span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
        </div><!-- /.col --> 
      </div><!-- /.row -->
    </div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Event</h4>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead >
                  <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th style="text-align:center">Date</th>
                    <th style="text-align:center">Place</th>
                  </tr>
                </thead>
                    <?php $ID = 0; ?>
                    <?php foreach($Calendar as $calendar){
                    ?>
                <tbody>
                  <tr    style="text-align:center">
                    <td  style="text-align:left"><?php echo $ID ?></td>
                    <td  style="text-align:left"><?= $calendar->title;?></td>
                    <td><?= $calendar->start;?> </span></td>
                    <td><?= $calendar->place;?></span></td>
                  </tr>
                <?php $ID= $ID+1; ?>  
                </tbody>
                    <?php }?>   <!-- for each-->
                <tfoot >
                  <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th style="text-align:center">Date</th>
                    <th style="text-align:center">Place</th>
                  </tr>
                </tfoot>
              </table>
            </div><!-- /.table-responsive -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



       
