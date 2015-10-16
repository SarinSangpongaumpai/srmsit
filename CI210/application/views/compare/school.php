<link href="<?php echo base_url();?>css/summaryReport.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<?php 
      if(false !== ($CostEvent1)){ foreach($CostEvent1 as $CostEvent){
          $cost1 = $CostEvent->cost;
          $totalEvent1 = $CostEvent->totalEvent;}}
       else{ $cost1 = "0"; $totalEvent1 = "0"; }
?>
<?php 
      if(false !== ($CostEvent2)){foreach($CostEvent2 as $CostEvent){ 
          $cost2 = $CostEvent->cost;
          $totalEvent2 = $CostEvent->totalEvent;}}
      else{ $cost2 = "0"; $totalEvent2 = "0";}
?>
<?php 
      if(false !== ($CS1)){ foreach($CS1 as $CS1){  $CS1 = $CS1->number; }}
      else{ $CS1 = 0;}
      if(false !== ($CS2)){ foreach($CS2 as $CS2){  $CS2 = $CS2->number; }}
      else{ $CS2 = 0;}
      if(false !== ($IT1)){ foreach($IT1 as $IT1){  $IT1 = $IT1->number; }}
      else{ $IT1 = 0;}
      if(false !== ($IT2)){ foreach($IT2 as $IT2){  $IT2 = $IT2->number; }}
      else{ $IT2 = 0;}
?>
<?php 
      if(false !== ($Male1)){ foreach($Male1 as $Male1){  $Male1 = $Male1->number; }}
      else{ $Male1 = 0;}
      if(false !== ($Male2)){ foreach($Male2 as $Male2){  $Male2 = $Male2->number; }}
      else{ $Male2 = 0;}
      if(false !== ($Female1)){ foreach($Female1 as $Female1){  $Female1 = $Female1->number; }}
      else{ $Female1 = 0;}
      if(false !== ($Female2)){ foreach($Female2 as $Female2){  $Female2 = $Female2->number; }}
      else{ $Female2 = 0;}
?>
<?php 
      if(false !== ($MathSci1)){ foreach($MathSci1 as $MathSci1){  $MathSci1 = $MathSci1->number; }}
      else{ $MathSci1 = 0;}
      if(false !== ($MathSci2)){ foreach($MathSci2 as $MathSci2){  $MathSci2 = $MathSci2->number; }}
      else{ $MathSci2 = 0;}
      if(false !== ($EngMath1)){ foreach($EngMath1 as $EngMath1){  $EngMath1 = $EngMath1->number; }}
      else{ $EngMath1 = 0;}
      if(false !== ($EngMath2)){ foreach($EngMath2 as $EngMath2){  $EngMath2 = $EngMath2->number; }}
      else{ $EngMath2 = 0;}
      if(false !== ($ArtMath1)){ foreach($ArtMath1 as $ArtMath1){  $ArtMath1 = $ArtMath1->number; }}
      else{ $ArtMath1 = 0;}
      if(false !== ($ArtMath2)){ foreach($ArtMath2 as $ArtMath2){  $ArtMath2 = $ArtMath2->number; }}
      else{ $ArtMath2 = 0;}
      if(false !== ($ETC1)){ foreach($ETC1 as $ETC1){  $ETC1 = $ETC1->number; }}
      else{ $ETC1 = 0;}
      if(false !== ($ETC2)){ foreach($ETC2 as $ETC2){  $ETC2 = $ETC2->number; }}
      else{ $ETC2 = 0;}
?>
<?php 
      if(false !== ($M41)){ foreach($M41 as $M41){  $M41 = $M41->number; }}
      else{ $M41 = 0;}
      if(false !== ($M42)){ foreach($M42 as $M42){  $M42 = $M42->number; }}
      else{ $M42 = 0;}
      if(false !== ($M51)){ foreach($M51 as $M51){  $M51 = $M51->number; }}
      else{ $M51 = 0;}
      if(false !== ($M52)){ foreach($M52 as $M52){  $M52 = $M52->number; }}
      else{ $M52 = 0;}
      if(false !== ($M61)){ foreach($M61 as $M61){  $M61 = $M61->number; }}
      else{ $M61 = 0;}
      if(false !== ($M62)){ foreach($M62 as $M62){  $M62 = $M62->number; }}
      else{ $M62 = 0;}
?>
<?php 
      if(false !== ($participant1)){ foreach($participant1 as $p1){  $participant1 = $p1->number; }}
      else{ $participant1 = 0;}
      if(false !== ($participant2)){ foreach($participant2 as $p2){  $participant2 = $p2->number; }}
      else{ $participant2 = 0;}
      if($participant1 > $participant2){ $max = $participant1;}
      else{$max = $participant2;}
?>
<?php 
      if(false !== ($register1)){ foreach($register1 as $r1){  $register1 = $r1->number; }}
      else{ $register1 = 0;}
      if(false !== ($register2)){ foreach($register2 as $r2){  $register2 = $r2->number; }}
      else{ $register2 = 0;}
?>
<?php $effective1 = 0; $effective2 = 0;
      $registerTemp1 = $register1+1;
      $registerTemp2 = $register2+1;
      //$half1 = 0;
      $half1       = $registerTemp1+$registerTemp2;
      $effective1  = $registerTemp1/$half1*50/100*100;
      $effective2  = $registerTemp2/$half1*50/100*100;

      $participantTemp1 = $participant1+1;
      $participantTemp2 = $participant2+1;
      $half2       = $participantTemp1+$participantTemp2;
      $effective1  = round($effective1+($participantTemp1/$half2*50/100)*100,2);
      $effective2  = round($effective2+($participantTemp2/$half2*50/100)*100,2);
?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-bar-chart-o"></i>Compare Place </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url()?>main/current"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="<?php echo base_url()?>summaryReport/school?place=KMUTT"><i class="fa fa-book"></i>SummaryReport</a></li>
      <li class="active">ComparePlace</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
       <div class="nav-tabs-custom">

          <div class="tab-content">
            <div class="active tab-pane" id="activity">
               <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right">
                  <div class="row" style="font-size:1.5em">
                    <div class="col-sm-6 col-xs-6">
                      <div class="description-block border-right" >
                        <img style="width:50%"
            src="<?php echo base_url()?>img/schoolLogo/<?php echo $school1?>.png" alt="User profile picture">
            <br><h5 style=" font-weight: bold;font-size:1.5em"><a 
                    href="#changeSchool1" data-toggle="modal" ><?php echo $school1?></a></h5>
                    <?php if($effective1 > $effective2){  ?>
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo $effective1?>%</span>
                        <?php }
                        else if($effective1 == $effective2){ ?>
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo $effective1?>%</span>
                        <?php }
                        else{  ?>
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo $effective1?>%</span>
                        
                        <?php }?>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-6 col-xs-6">
                      <div class="description-block border-right">
                        <img style="width:50%"
            src="<?php echo base_url()?>img/schoolLogo/<?php echo $school2?>.png" alt="User profile picture">
            <br><h5 style=" font-weight: bold;font-size:1.5em"class="profile-username text-center"><a 
                    href="#changeSchool2" data-toggle="modal" ><?php echo $school2?></a></h5></h5>
                      <?php if($effective1 > $effective2){  ?>
                        <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> <?php echo $effective2?>%</span>
                        <?php }
                        else if($effective1 == $effective2){ ?>
                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> <?php echo $effective2?>%</span>
                        <?php }
                        else{  ?>
                        <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> <?php echo $effective2?>%</span>
                        
                        <?php }?>
                        <h5 class="description-header"></h5>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                  </div>
                  <div style="text-align:center;font-size:20px" >
                  <strong>( <?php echo $start." - ".$end ?> )</strong><br>
                  <small><a style=" font-weight: bold;"
                    href="#changeDate" data-toggle="modal" >Click change date</a></small>
                </ul>
                <div id="chartdiv"></div> 
                <br>
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs ">
                    <li class="pull-left header" ><i class="fa fa-table"></i>Event's description</li>
                  </ul>
                
                <div class="table-responsive">
                  <table class="table no-margin" style="text-align: center;">
                    <tr>
                      <th style="text-align: center; " rowspan="1" colspan="1">โรงเรียน</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">จำนวนคนเข้าสมัครเรียน</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">ComputerScience</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">InformationTechnology</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">เงินที่ใช้ในกิจกรรม</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">จำนวนครั้งที่จัด</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">ผู้เข้าร่วมทั้งหมด</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">เพศชาย</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">เพศหญิง</th>
                      <tr >
                        <td><?php echo $school1?></td>
                        <td><?php echo $register1?></td>
                        <td><?php echo $CS1?></td>
                        <td><?php echo $IT1?></td>
                        <td><?php echo $cost1?></td>
                        <td><?php echo $totalEvent1?></td>
                        <td><?php echo $participant1?></td>
                        <td><?php echo $Male1?></td>
                        <td><?php echo $Female1?></td>
                      </tr>
                     </tr>
                        <td><?php echo $school2?></td>
                        <td><?php echo $register2?></td>
                        <td><?php echo $CS2?></td>
                        <td><?php echo $IT2?></td>
                        <td><?php echo $cost2?></td>
                        <td><?php echo $totalEvent2?></td>
                        <td><?php echo $participant2?></td>
                        <td><?php echo $Male2?></td>
                        <td><?php echo $Female2?></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  <br>
                  <ul class="nav nav-tabs ">
                    <li class="pull-left header" ><i class="fa fa-table"></i>Student's description</li>
                  </ul>
                <div class="table-responsive">
                  <table class="table no-margin" style="text-align: center;">
                    <tr>
                      <th style="text-align: center; " rowspan="1" colspan="1">โรงเรียน</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">มัธยมศึกษาปีที่4</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">มัธยมศึกษาปีที่5</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">มัธยมศึกษาปีที่6</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">วิทย์คณิต</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">ศิลป์คำนวน</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">ศิลป์ภาษา</th>
                      <th style="text-align: center; " rowspan="1" colspan="1">อื่นๆ</th>
                      <tr >
                      <tr >
                        <td><?php echo $school1?></td>
                        <td><?php echo $M41?></td>
                        <td><?php echo $M51?></td>
                        <td><?php echo $M61?></td>
                        <td><?php echo $MathSci1?></td>
                        <td><?php echo $ArtMath1?></td>
                        <td><?php echo $EngMath1?></td>
                        <td><?php echo $ETC1?></td>
                      </tr>
                       <tr >
                        <td><?php echo $school2?></td>
                        <td><?php echo $M42?></td>
                        <td><?php echo $M52?></td>
                        <td><?php echo $M61?></td>
                        <td><?php echo $MathSci2?></td>
                        <td><?php echo $ArtMath2?></td>
                        <td><?php echo $EngMath2?></td>
                        <td><?php echo $ETC2?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col -->

  </section><!-- /.content -->
</div>
<script src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="http://www.amcharts.com/lib/3/serial.js"></script>
<script src="http://www.amcharts.com/lib/3/themes/light.js"></script>
  <script>
  var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "rotate": true,
  "marginBottom": 50,
  "dataProvider": [{
    "col": "จำนวนคนเข้าสมัครทั้งหมด",
    "school1": -<?php echo $register1 ?>,
    "school2": <?php echo $register2 ?>
  },{
    "col": "เงินที่ใช้ในกิจกรรมทั้งหมด(ล้านบาท)",
    "school1": -<?php echo $cost1/1000000 ?>,
    "school2": <?php echo $cost2/1000000 ?>
  },{
    "col": "จำนวนครั้งที่จัด",
    "school1": -<?php echo $totalEvent1 ?>,
    "school2": <?php echo $totalEvent2 ?>
  }, {
    "col": "ผู้เข้าร่วมทั้งหมด",
    "school1": -<?php echo $participant1 ?>,
    "school2": <?php echo $participant2 ?>
  }, {
    "col": "เพศชาย",
    "school1": -<?php echo $Male1 ?>,
    "school2": <?php echo $Male2 ?>
  },{
    "col": "เพศหญิง",
    "school1": -<?php echo $Female1 ?>,
    "school2": <?php echo $Female2 ?>
  }, {
    "col": "มัธยมศึกษาปีที่4",
    "school1": -<?php echo $M41 ?>,
    "school2": <?php echo $M42 ?>
  }, {
    "col": "มัธยมศึกษาปีที่5",
    "school1": -<?php echo $M51 ?>,
    "school2": <?php echo $M52 ?>
  }, {
    "col": "มัธยมศึกษาปีที่6",
    "school1": -<?php echo $M61 ?>,
    "school2": <?php echo $M62 ?>
  },{
    "col": "วิทย์คณิต",
    "school1": -<?php echo $MathSci1 ?>,
    "school2": <?php echo $MathSci2 ?>
  },{
    "col": "ศิลป์คำนวน",
    "school1": -<?php echo $EngMath1 ?>,
    "school2": <?php echo $EngMath2 ?>
  },{
    "col": "ศิลป์ภาษา",
    "school1": -<?php echo $ArtMath1 ?>,
    "school2": <?php echo $ArtMath2 ?>
  },{
    "col": "อื่นๆ",
    "school1": -<?php echo $ETC1 ?>,
    "school2": <?php echo $ETC2 ?>
  },{
    "col": "CS",
    "school1": -<?php echo $CS1 ?>,
    "school2": <?php echo $CS2 ?>
  },{
    "col": "IT",
    "school1": -<?php echo $IT1 ?>,
    "school2": <?php echo $IT2 ?>
  },{
    "col": "Maximum ",
    "school1": -<?php echo $max ?>,
    "school2": <?php echo $max ?>
  }],
  "startDuration": 1,
  "graphs": [{
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "school1",
    "title": "KMUTT",
    "valueText":  "[[title]]",
    "labelText": "[[value]][[title]]",
    "clustered": false,
    "labelFunction": function(item) {
      return Math.abs(item.values.value);
    },
    "balloonText" : "[[value]]",
    "balloonFunction": function(item) {
      if(item.category == "จำนวนครั้งที่จัด" ){
        return "<?php echo $school1 ?><br>"+item.category + ": " + Math.abs(item.values.value)+" ครั้ง" ;
      }
      else if(item.category == "เงินที่ใช้ในกิจกรรมทั้งหมด(ล้านบาท)"){
        return "<?php echo $school1 ?><br>"+item.category + ": " + Math.abs(item.values.value)+"ล้านบาท" ;
      }
      else{
        return "<?php echo $school1 ?><br>"+item.category + ": " + Math.abs(item.values.value)+" คน" ;
      }
    }
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "school2",
    "title": "KMUTT",
    "labelText": "[[value]]",
    "clustered": false,
    "labelFunction": function(item) {
      return Math.abs(item.values.value);
    },
    "balloonFunction": function(item) {
      if(item.category == "จำนวนครั้งที่จัด"){
        return "<?php echo $school2 ?><br>"+item.category + ": " + Math.abs(item.values.value)+" ครั้ง" ;
      }
      else{
        return "<?php echo $school2 ?><br>"+item.category + ": " + Math.abs(item.values.value)+" คน" ;
      }
    }
  }],
  "categoryField": "col",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0.2,
    "axisAlpha": 0
  },
  "valueAxes": [{
    "gridAlpha": 0,
    "ignoreAxisWidth": true,
    "labelFunction": function(value) {
      return Math.abs(value);
    },
    "guides": [{
      "value": 0,
      "lineAlpha": 0.2
    }]
  }],
  "balloon": {
    "fixedPosition": true
  },
  "chartCursor": {
    "valueBalloonsEnabled": false,
    "cursorAlpha": 0.05,
    "fullWidth": true
  },
  "allLabels": [{
    "text": "<?php echo $school1?>(blue)",
    "x": "40%",
    "y": "97%",
    "bold": true,
    "align": "middle"
  }, {
    "text": "<?php echo $school2?>(yellow)",
    "x": "75%",
    "y": "97%",
    "bold": true,
    "align": "middle"
  }],
 "export": {
    "enabled": true
  }   

});
  </script>
  <style>
  #chartdiv {
  width   : 86%;
  height    : 500px;
  font-size : 11px;
}           
  </style>

 <div class="modal fade" id="changeDate">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Change Start and End date</h4>
        </div>
        <div class="modal-body">
          <div style="height: 200px;">
                <div class="body ">
                  <?php echo form_open('compareSchool/school'); ?>
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" class="form-control" id="start" name="start">
                  </div><br>
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" class="form-control" id="end" name="end">
                  </div><br>
                  <div style="display:none"class="input-group">
                    <input type="text" class="form-control" id="school1" name="school1" value="<?php echo $school1 ?>">
                  </div>
                  <div style="display:none" class="input-group">
                    <input type="text" class="form-control" id="school2" name="school2" value="<?php echo $school2 ?>">
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button name="submitDate" id="submitDate" type="submit" class="btn btn-primary">Search</button>
                </div>
              </form> 
              <script>
                  document.getElementById('submitDate').addEventListener('click', function (e) {
                        window.location.href = "<?php echo base_url()?>compareSchool/school";
                    });
              </script>        
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
   
   <div class="modal fade" id="changeSchool1">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Change 1st School</h4>
        </div>
        <div class="modal-body">
          <div style="height: 150px;">
                <div class="body ">
                  <?php echo form_open('compareSchool/school'); ?>
                  <div style="display:none" class="input-group">
                    <input type="text" class="form-control" id="school2" name="school2" value="<?php echo $school2 ?>">
                  </div>
                   <div style="display:none" class="input-group">
                    <input type="text" class="form-control" id="start" name="start" value="<?php echo $start ?>">
                  </div>
                   <div style="display:none" class="input-group">
                    <input type="text" class="form-control" id="end" name="end" value="<?php echo $end ?>">
                  </div>
                  <div class="form-group">
                    <label>School's name</label>
                    <select id = "school1"  name="school1"
                    class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      
                      <?php foreach ($allSchool as $b) {
                        $code = $b->school_code;
                        $name = $b->name;
                        if($school1 == $code){
                        ?>
                          <option value="<?php echo $school1?>"selected="selected"><?php echo $name?></option>
                        <?php
                        }
                        else{
                          ?>
                      <option value="<?php echo $code ?>"><?php echo $name?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button name="submitSchool1" id="submitSchool1" type="submit" class="btn btn-primary">Search</button>
                    </div> 
                </form> 
              <script>
                  document.getElementById('submitSchool1').addEventListener('click', function (e) {
                        window.location.href = "<?php echo base_url()?>compareSchool/school";
                    });
              </script>        
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div class="modal fade" id="changeSchool2">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Change 2rd School</h4>
        </div>
        <div class="modal-body">
          <div style="height: 150px;">
                <div class="body ">
                  <?php echo form_open('compareSchool/school'); ?>
                  <div style="display:none" class="input-group">
                    <input type="text" class="form-control" id="school1" name="school1" value="<?php echo $school1 ?>">
                  </div>
                   <div style="display:none" class="input-group">
                    <input type="text" class="form-control" id="start" name="start" value="<?php echo $start ?>">
                  </div>
                   <div style="display:none" class="input-group">
                    <input type="text" class="form-control" id="end" name="end" value="<?php echo $end ?>">
                  </div>
                  <div class="form-group">
                    <label>School's name</label>
                    <select id = "school2"  name="school2"
                    class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                      
                      <?php foreach ($allSchool as $a) {
                        $code = $a->school_code;
                        $name = $a->name;
                        if($school2 == $code){
                        ?>
                          <option value="<?php echo $school2?>"selected="selected"><?php echo $name?></option>
                        <?php
                        }
                        else{
                          ?>
                      <option value="<?php echo $code ?>"><?php echo $name?></option>
                      <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button name="submitSchool2" id="submitSchool2" type="submit" class="btn btn-primary">Search</button>
                </div>
              </form> 
              <script>
                  document.getElementById('submitSchool2').addEventListener('click', function (e) {
                        window.location.href = "<?php echo base_url()?>compareSchool/school";
                    });
              </script>        
            </div>
          </div>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<script>
var chart2;            
    $(document).ready(function(){
      $.getJSON("<?php echo base_url() ?>summaryReportEvent/getCostEffective",  function (data) {
        chart2.dataProvider = data; 
        chart2.validateData();
      });
    });
var chart2 = AmCharts.makeChart("chartdiv2", {
  "type": "serial",
    "theme": "light",
    "marginRight": 80,
    "autoMarginOffset": 20,
    "marginTop": 7,
    "valueAxes": [{
        "axisAlpha": 0.2,
        "dashLength": 1,
        "position": "left"
    }],
    "mouseWheelZoomEnabled": true,
    "graphs": [{
        "id": "g1",
        "labelText": "[[title]]",
        "balloonText": "Actual <br>[[category]]<br/><b><span style='font-size:14px;'>value: [[value]]</span></b>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "title": "Actual",
        "valueField": "actual",
        "useLineColorForBulletBorder": true
    },{
        "id": "g2",
        "balloonText": "Expected <br>[[category]]<br/><b><span style='font-size:14px;'>value: [[value]]</span></b>",
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "hideBulletsCount": 50,
        "title": "Expected",
        "valueField": "expected",
        "useLineColorForBulletBorder": true
    }],
    "chartScrollbar": {
        "autoGridCount": true,
        "graph": "g1",
        "scrollbarHeight": 40
    },
    "chartCursor": {

    },
    "categoryField": "date",
    "categoryAxis": {
        "parseDates": true,
        "axisColor": "#DADADA",
        "dashLength": 1,
        "minorGridEnabled": true
    },
    "export": {
        "enabled": true
    },
    "legend": {
      "useGraphSettings": true,
      "position": "top"
    }
});
  </script>



      
<style>
#chartdiv2 {
    width   : 100%;
  height    : 500px;
}
</style>
      
