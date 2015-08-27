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
                          $currentSchoolName     = $current->school_name;
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
              style="position:relative;display: inline-block;width:30% ;left:120px" >
              <img  style="width:30%;"src="../img/button/rightArrow.png" >
            </a>
            <ul class="products-list product-list-in-box">        
              <div style="text-align:center">
                <a href="javascript::;" class="product-title"><?php echo $currentSchoolName ?>
                  </ul>
              </div><!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="javascript::;" class="uppercase">View More Details</a>
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
                    <?php foreach($Event as $event){
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
                    <?php }?>   <!-- for each-->
              </table>
            </div><!-- /.table-responsive -->
          </div><!-- /.box-body -->
          <div class="box-footer text-center">
            <a href="javascript::;" class="uppercase">View more events</a>
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




       
